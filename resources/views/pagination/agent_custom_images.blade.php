@php
$agent = Auth::user();
$agentCustomImagesData = App\Models\DynamicImage::where('is_common', 0)->simplePaginate(10);
$url = 'http://127.0.0.1:8000/images/agent_custom_images/' . $agent->email;
@endphp
<div class="text-end me-3">
    <label class="custom-file-upload btn-dark mb-3">
        <input id="fileUpload"
            onchange="saveImageToAgentDirectory('{{ $agent->email }}', '{{ $agent->id }}' , 'fileUpload')"
            type="file" />
        <i class='bx bx-upload'></i> Add Custom Image
    </label>
</div>
<div class="dynamicImagesFlexContainer ms-5">
    @for ($i = 0; $i < count($agentCustomImagesData); $i++)
        <div onclick="showDynamicImageInPopUp({{ $agentCustomImagesData[$i] }},'{{ $url }}')">
            <img width="70%" src="{{ $url }}/{{ $agentCustomImagesData[$i]->file_name }}" alt="">
        </div>
        <article id="crossIconOnAgentCustomImage" class="text-end lh-1">
            <i onclick="deleteAgentImage('{{ $agentCustomImagesData[$i]->id }}' , '{{ $agentCustomImagesData[$i]->file_name }}' , '{{ $agent->email }}')"
                class='fs-3 bx bxs-x-square'></i>
        </article>
    @endfor
</div>
<div class="text-end my-3 me-3">
    {{ $agentCustomImagesData->links() }}
</div>
