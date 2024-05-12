<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Send Mail Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .ck-editor__editable_inline{
            height:450px;
        }
    </style>
</head>
<body>
<div class="pcoded-content mt-3">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-body">
                        <div class="card">
                            <div class="card-header">
                                <h5>Manage Data</h5>
                            </div>
                            <div class="card-block">
                                <form action="{{url('user/post-save-email-data')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-sm-7">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Subject:<sup class="error">*</sup></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="subject" required
                                                           id="subject" placeholder="Subject"
                                                           value="">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Message:<sup class="error">*</sup></label>
                                                <div class="col-sm-8">
                                                    <textarea id="editor" name="message"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" type="submit" style="position:relative;left:542px;width:78px;height:48px;">save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    ClassicEditor
		.create( document.querySelector( '#editor'),
     {
        ckfinder:
        {
            uploadUrl: "{{ route('ckeditor.upload') }}?_token=" + csrfToken,
        }
     })
		.catch( error => {
			console.error( error );
		} );
        console.log(csrfToken);
</script>
</body>
</html>
