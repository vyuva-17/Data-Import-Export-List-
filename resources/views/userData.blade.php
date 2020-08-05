<!DOCTYPE html>
<html>
    <head>
        <title>Import / Export Excel with Data List</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <style>
            /*Progress Bar Default Style Part */
            .progress { position:relative; width:100%; height:30px; border: 1px solid #7F98B2; padding: 1px; border-radius: 3px; }
            .bar { background-color: #B4F5B4; width:0%; height:25px; border-radius: 3px; }
            .percent { position:absolute; display:inline-block; top:3px; left:48%; color: #7F98B2;}
        </style>
    </head>
    <body>
        <h2 style="text-align:center;color:#20c997">Import / Export Excel with Data List</h2>
        <!-- Import Excel View Part in Card-->
        <div class="container" style="margin-bottom:5%">
            <div class="card  mt-3" style="margin-bottom:5%">
                <div class="card-header" style="color:#ffff; background-color:#20c997">
                Import Excel
                </div>
                <div class="card-body">
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <div class="progress">
                            <div class="bar"></div >
                            <div class="percent">0%</div >
                        </div>
                        <button class="btn btn-sm" style="margin-top:2%; color:#ffff; background-color:#20c997"">Import User Data</button>
                    </form>
                </div>
            </div>
             <!-- Export Excel/ Imported Data View Part in table-->
            <div class="row">
                <h4 class="col-lg-10" style="color:#20c997">User Data List</h4>
                <a class="col-lg-2 btn btn-sm " style="margin-bottom:1%; color:#ffff; background-color:#20c997" href="{{ route('export') }}">Export User Data</a>
                <table class=" col-lg-12 table table-striped table-borderless table-responsive-sm">
                    <thead style="color:#ffff; background-color:#20c997">
                    <tr>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Email ID</th>
                        <th>Company</th>
                        <th>Designation</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user as $userValue)
                    <tr>
                        <td>{{$userValue->name}}</td>
                        <td>{{$userValue->mobile_number}}</td>
                        <td>{{$userValue->email_id}}</td>
                        <td>{{$userValue->company}}</td>
                        <td>{{$userValue->designation}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>

        <script type="text/javascript">
            /*Progress Bar Design while importing the document*/
            function validate(formData, jqForm, options) {
                var form = jqForm[0];
                if (!form.file.value) {
                    alert('File not found');
                    return false;
                }
            }

            (function() {

            var bar = $('.bar');
            var percent = $('.percent');
            var status = $('#status');

            $('form').ajaxForm({
                beforeSubmit: validate,
                beforeSend: function() {
                    status.empty();
                    var percentVal = '0%';
                    var posterValue = $('input[name=file]').fieldValue();
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                success: function() {
                    var percentVal = 'Wait, Saving';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    status.html(xhr.responseText);
                    alert('Uploaded Successfully');
                    window.location.href = "/importExportView";
                }
            });

            })();
        </script>

    </body>
</html>
