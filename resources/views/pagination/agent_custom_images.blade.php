@php
$user = Auth::user();
$agentCustomImagesData = App\Models\DynamicImage::where('is_common', 0)->simplePaginate(10);
$url = 'https://app.yourbrokerjourney.ca/images/common_images';
@endphp
<h1>{{ $user }}</h1>
<div class="text-end me-3">
    <label class="custom-file-upload btn-dark">
        <input id="fileUpload" onchange="saveImageToAgentDirectory()" type="file" />
        <i class='bx bx-upload'></i> Add Custom Image
    </label>
</div>
<div class="dynamicImagesFlexContainer ms-5">
    @for ($i = 0; $i < count($agentCustomImagesData); $i++)
        <div onclick="showDynamicImageInPopUp({{ $agentCustomImagesData[$i] }},'{{ $url }}')">
            <img width="200px" src="{{ $url }}/{{ $agentCustomImagesData[$i]->file_name }}" alt="">
        </div>
    @endfor
</div>
<div class="text-end my-3 me-3">
    {{ $agentCustomImagesData->links() }}
</div>
