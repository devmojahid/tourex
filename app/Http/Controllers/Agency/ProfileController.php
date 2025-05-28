<?php

namespace App\Http\Controllers\Agency;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth, File, Image, Str, Hash;
use App\Http\Controllers\Controller;
use Modules\Coupon\App\Models\Coupon;
use Modules\Course\App\Models\Course;
use Modules\Wishlist\App\Models\Wishlist;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseReview;
use App\Http\Requests\PasswordChangeRequest;
use Modules\Coupon\App\Models\CouponHistory;
use App\Http\Requests\BecomeAgencyRequest;
use Modules\Course\App\Models\LessonChecklist;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\NoticeBoard\App\Models\NoticeBoard;
use App\Http\Requests\EditStudentProfileRequest;
use Modules\Course\App\Models\CourseTranslation;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;
use Modules\SupportTicket\App\Models\SupportTicketMessage;

class ProfileController extends Controller
{
    public function dashboard()
    {

        $user = Auth::guard('web')->user();

        $enrollments = CourseEnrollmentList::with('course_enrollment.student')->where('instructor_id', $user->id)->latest()->take(10)->get();

        $withdraw_list = SellerWithdraw::where('seller_id', $user->id)->get();

        $total_income = CourseEnrollmentList::whereHas('course_enrollment', function ($query) {
            $query->where('payment_status', 'success');
        })->where('instructor_id', $user->id)->sum('total_amount');

        $course_sale_qty = CourseEnrollmentList::whereHas('course_enrollment', function ($query) {
            $query->where('payment_status', 'success');
        })->where('instructor_id', $user->id)->count();


        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $total_income;
        if ($commission_type == 'commission') {
            $total_commission = ($commission_per_sale / 100) * $total_income;
            $net_income = $total_income - $total_commission;
        }

        $pending_success_list = SellerWithdraw::where('seller_id', $user->id)->where('status', '!=', 'rejected')->sum('total_amount');

        $total_withdraw_amount = $pending_success_list;

        $current_balance = $net_income - $total_withdraw_amount;

        $pending_withdraw = SellerWithdraw::where('seller_id', $user->id)->where('status', 'pending')->sum('total_amount');

        $total_active_course = Course::where('approved_by_admin', 'approved')->where('user_id', $user->id)->count();

        $lable = array();
        $data = array();
        $start = new Carbon('first day of this month');
        $last = new Carbon('last day of this month');
        $first_date = $start->format('Y-m-d');
        $last_date = $last->format('Y-m-d');
        $today = date('Y-m-d');
        $length = date('d') - $start->format('d');

        for ($i = 1; $i <= $length + 1; $i++) {

            $date = '';
            if ($i == 1) {
                $date = $first_date;
            } else {
                $date = $start->addDays(1)->format('Y-m-d');
            };

            $sum = CourseEnrollmentList::whereHas('course_enrollment', function ($query) {
                $query->where('payment_status', 'success');
            })->where('instructor_id', $user->id)->whereDate('created_at', $date)->sum('total_amount');
            $data[] = $sum;
            $lable[] = $i;
        }

        $data = json_encode($data);
        $lable = json_encode($lable);


        return view('agency.dashboard', [
            'lable' => $lable,
            'data' => $data,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'current_balance' => $current_balance,
            'total_withdraw_amount' => $total_withdraw_amount,
            'pending_withdraw' => $pending_withdraw,
            'course_sale_qty' => $course_sale_qty,
            'total_active_course' => $total_active_course,
            'enrollments' => $enrollments,
        ]);
    }

    public function edit_profile()
    {
        $user = Auth::guard('web')->user();

        return view('agency.edit_profile', ['user' => $user]);
    }

    public function update_profile(EditStudentProfileRequest $request)
    {

        $user = Auth::guard('web')->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        if ($request->file('image')) {
            $old_image = $user->image;
            $user_image = $request->image;
            $extention = $user_image->getClientOriginalExtension();
            $image_name = Str::slug($user->name) . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $extention;
            $image_name = 'uploads/custom-images/' . $image_name;
            Image::make($user_image)->save(public_path() . '/' . $image_name);
            $user->image = $image_name;
            $user->save();
            if ($old_image) {
                if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            }
        }

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function change_password()
    {
        return view('agency.change_password');
    }

    public function update_password(PasswordChangeRequest $request)
    {

        $user = Auth::guard('web')->user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            $notify_message = trans('translate.Password changed successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);
        } else {
            $notify_message = trans('translate.Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }
    }


    public function agency_profile(Request $request)
    {

        $user = Auth::guard('web')->user();

        $skills_expertises = json_decode($user->skills_expertise);

        return view('agency.agency_profile', [
            'user' => $user,
            'skills_expertises' => $skills_expertises,
        ]);
    }

    public function update_agency_profile(BecomeAgencyRequest $request)
    {
        $user = Auth::guard('web')->user();

        $user->agency_name = $request->agency_name;
        $user->agency_slug = $request->agency_slug;
        $user->website = $request->website;
        $user->location_map = $request->location_map;

        $user->about_me = $request->about_me;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->facebook = $request->facebook;
        $user->linkedin = $request->linkedin;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->save();

        if ($request->hasFile('agency_logo')) {

            $old_agency_logo = $user->agency_logo;

            if ($old_agency_logo) {
                if (File::exists(public_path() . '/' . $old_agency_logo)) unlink(public_path() . '/' . $old_agency_logo);
            }

            $file = $request->file('agency_logo');
            $imageName = 'uploads/custom-images/' . Str::slug($user->agency_name) . '-' . now()->format('YmdHis') . '-' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->save(public_path($imageName));

            $user->agency_logo = $imageName;
            $user->save();
        }

        $notify_message = trans('translate.Updated successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }



    public function account_delete()
    {
        return view('agency.account_delete');
    }

    public function confirm_account_delete(Request $request)
    {

        $user = Auth::guard('web')->user();

        $request->validate([
            'current_password' => 'required'
        ], [
            'current_password.required' => trans('translate.Current password is required')
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            $notify_message = trans('translate.Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $user_image = $user->image;

        if ($user_image) {
            if (File::exists(public_path() . '/' . $user_image)) unlink(public_path() . '/' . $user_image);
        }

        $user_id = $user->id;
        Coupon::where('seller_id', $user_id)->delete();
        CouponHistory::where('seller_id', $user_id)->delete();
        CouponHistory::where('buyer_id', $user_id)->delete();

        $courses = Course::where('user_id', $user_id)->get();

        foreach ($courses as $course) {
            CourseEnrollmentList::where('course_id', $course->id)->delete();
            $modules = CourseModule::where('course_id', $course->id)->get();
            foreach ($modules as $module) {
                CourseModuleLesson::where('course_module_id', $module->id)->delete();
                $module->delete();
            }

            LessonChecklist::where('course_id', $course->id)->delete();
            CourseTranslation::where('course_id', $course->id)->delete();
            CourseReview::where('course_id', $course->id)->delete();

            $old_image = $course->thumb_image;
            if ($old_image) {
                if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            }

            $course->delete();
        }

        $enrollments = CourseEnrollment::where('student_id', $user_id)->get();

        foreach ($enrollments as $enrollment) {
            CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)->delete();
            $enrollment->delete();
        }

        CourseEnrollmentList::where('instructor_id', $user_id)->delete();


        CourseReview::where('student_id', $user_id)->delete();
        LessonChecklist::where('student_id', $user_id)->delete();
        CourseReview::where('instructor_id', $user_id)->delete();
        NoticeBoard::where('instructor_id', $user_id)->delete();
        SellerWithdraw::where('seller_id', $user_id)->delete();
        Wishlist::where('user_id', $user_id)->delete();

        $support_tickets = SupportTicket::where('author_id', $user->id)->latest()->get();

        foreach ($support_tickets as $support_ticket) {
            $ticket_messages = SupportTicketMessage::with('documents')->where('support_ticket_id', $support_ticket->id)->get();

            foreach ($ticket_messages as $ticket_message) {

                $documents = MessageDocument::where('message_id', $ticket_message->id)->where('model_name', 'SupportTicketMessage')->get();
                foreach ($documents as $document) {
                    $exist_file_name = $document->file_name;
                    if ($exist_file_name) {
                        if (File::exists(public_path('uploads/custom-images') . '/' . $exist_file_name)) unlink(public_path('uploads/custom-images') . '/' . $exist_file_name);
                    }

                    $document->delete();
                }

                $ticket_message->delete();
            }

            $support_ticket->delete();
        }

        $user->delete();

        Auth::guard('web')->logout();

        $notify_message = trans('translate.Your account deleted successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('user.login')->with($notify_message);
    }
}
