<div class="card">
    <div class="card-body">
        <fieldset class="border rounded-3 p-3">
            <legend>Video Information</legend>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Video Title (English) <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" value="{{ old('title', $row ? $row->title : '') }}" required placeholder="e.g. Harvesting Marshi Rice in Sinja Valley">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nepali Title</label>
                    <input type="text" class="form-control" name="nepali_title" value="{{ old('nepali_title', $row ? $row->nepali_title : '') }}" placeholder="e.g. जुम्लाको मार्सी धान भित्र्याउँदै किसानहरू">
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 mb-3">
                    <label class="form-label">YouTube Video URL / Link <span class="text-danger">*</span></label>
                    <input type="url" class="form-control" name="video_url" value="{{ old('video_url', $row ? $row->video_url : '') }}" required placeholder="https://www.youtube.com/watch?v=...">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Duration</label>
                    <input type="text" class="form-control" name="duration" value="{{ old('duration', $row ? $row->duration : '4:15') }}" placeholder="e.g. 4:15, 3:30">
                </div>
            </div>
        </fieldset>
    </div>
</div>
