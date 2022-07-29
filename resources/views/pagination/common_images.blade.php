@php
$dynamicImagesData = App\Models\DynamicImage::where('is_common', 1)->simplePaginate(10);
$url = 'https://app.yourbrokerjourney.ca/images/common_images';

@endphp
<div class="dynamicImagesFlexContainer ms-5">
    @for ($i = 0; $i < count($dynamicImagesData); $i++)
        <div onclick="showDynamicImageInPopUp({{ $dynamicImagesData[$i] }},'{{ $url }}')">
            <img width="200px" src="{{ $url }}/{{ $dynamicImagesData[$i]->file_name }}" alt="">
        </div>
    @endfor
</div>
<div class="text-end my-3 me-3">
    {{ $dynamicImagesData->links() }}
</div>
