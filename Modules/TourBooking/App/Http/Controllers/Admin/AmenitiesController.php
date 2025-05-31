<?php

declare(strict_types=1);

namespace Modules\TourBooking\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Modules\Language\App\Models\Language;
use Modules\TourBooking\App\Models\Amenity;
use Modules\TourBooking\App\Models\AmenityTranslation;
use Modules\TourBooking\App\Models\Destination;
use Modules\TourBooking\App\Models\Service;

final class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $amenities = Amenity::with('translation')
            ->latest()
            ->paginate(15);

        return view('tourbooking::admin.amenity.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tourbooking::admin.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:amenities,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|boolean',
        ]);

        $aminity = new Amenity();

        if ($request->image) {
            $image_name = 'aminity-' . date('-Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $request->image->getClientOriginalExtension();
            $image_name = 'uploads/custom-images/' . $image_name;
            $request->image->move(public_path('uploads/custom-images'), $image_name);
            $aminity->image = $image_name ?? null;
        }

        $aminity->slug = $request->slug;
        $aminity->status = $request->status ? true : false;
        $aminity->save();

        $languages = Language::all();
        foreach ($languages as $language) {
            $sub_translation = new AmenityTranslation();
            $sub_translation->amenity_id = $aminity->id;
            $sub_translation->lang_code = $language->lang_code;
            $sub_translation->name = $request->name;
            $sub_translation->description = $request->description;
            $sub_translation->meta_title = $request->meta_title;
            $sub_translation->meta_keywords = $request->meta_keywords;
            $sub_translation->meta_description = $request->meta_description;
            $sub_translation->save();
        }

        $notify_message = trans('translate.Created Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.tourbooking.amenities.index')->with($notify_message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Amenity $amenity): View
    {

        // dd($amenity, $request->all());

        return view('tourbooking::admin.amenity.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination): RedirectResponse
    {

        if ($destination->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:amenities,slug,' . $destination->id,
            'description' => 'nullable|string',
            'country' => 'nullable|string|max:100',
            'region' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'latitude' => 'nullable|string|max:30',
            'longitude' => 'nullable|string|max:30',
            'status' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'show_on_homepage' => 'nullable|boolean',
        ]);

        // Handle image if present
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete old image if exists
            if ($destination->image) {
                @unlink(storage_path('app/public/' . $destination->image));
            }

            $imagePath = $request->file('image')->store('amenities', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['status'] = $request->has('status');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['show_on_homepage'] = $request->has('show_on_homepage');
        $validated['meta_title'] = $request->meta_title ?? null;
        $validated['meta_keywords'] = $request->meta_keywords ?? null;
        $validated['meta_description'] = $request->meta_description ?? null;

        $destination->update($validated);

        return redirect()->route('admin.tourbooking.amenities.index')
            ->with('success', 'Destination updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity): RedirectResponse
    {
        // Delete image if exists
        if ($amenity->image) {
            unlink($amenity->image);
        }

        $amenity->translations()->delete();

        $amenity->delete();

         $notify_message = trans('translate.Delete Successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.tourbooking.amenities.index')->with($notify_message);
    }

    public function updateStatus(Amenity $amenity): RedirectResponse|JsonResponse
    {
        $amenity->update(['status' => !$amenity->status]);

        $notify_message = trans('translate.Status updated');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');

        return response()->json($notify_message);
    }
}
