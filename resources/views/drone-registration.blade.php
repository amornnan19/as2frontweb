<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @auth
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">drone-registration</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('drone.register') }}" enctype="multipart/form-data">
                                @csrf
                                <!-- Part 1: PDF File Upload -->
                                <h2>Part 1: PDF File Upload</h2>
                                <div class="form-group">
                                    <label for="ct26">Document CT. 26</label>
                                    <input type="file" class="form-control-file" id="ct26" name="ct26"
                                        accept="application/pdf" onchange="previewFile(this.id)">
                                    <div id="ct26-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="ct30">Document CT. 30</label>
                                    <input type="file" class="form-control-file" id="ct30" name="ct30"
                                        accept="application/pdf" onchange="previewFile(this.id)">
                                    <div id="ct30-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="certificate">certificate</label>
                                    <input type="file" class="form-control-file" id="certificate" name="certificate"
                                        accept="application/pdf" onchange="previewFile(this.id)">
                                    <div id="certificate-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="personal_information_form">personal_information_form</label>
                                    <input type="file" class="form-control-file" id="personal_information_form"
                                        name="personal_information_form" accept="application/pdf"
                                        onchange="previewFile(this.id)">
                                    <div id="personal_information_form-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="request_for_registration">request_for_registration</label>
                                    <input type="file" class="form-control-file" id="request_for_registration"
                                        name="request_for_registration" accept="application/pdf"
                                        onchange="previewFile(this.id)">
                                    <div id="request_for_registration-preview"></div>
                                </div>

                                <!-- Part 2: Picture Upload -->
                                <h2>Part 2: Picture Upload</h2>
                                <div class="form-group">
                                    <label for="drone_photo">Drone Photography</label>
                                    <input type="file" class="form-control-file" id="drone_photo" name="drone_photo"
                                        accept="image/*" onchange="previewFile(this.id)">
                                    <div id="drone_photo-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="remote_photo">remote_photo</label>
                                    <input type="file" class="form-control-file" id="remote_photo" name="remote_photo"
                                        accept="image/*" onchange="previewFile(this.id)">
                                    <div id="remote_photo-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="photo_serial_number">photo_serial_number</label>
                                    <input type="file" class="form-control-file" id="photo_serial_number"
                                        name="photo_serial_number" accept="image/*" onchange="previewFile(this.id)">
                                    <div id="photo_serial_number-preview"></div>
                                </div>

                                <!-- Part 3: Additional Documents Upload -->
                                <h2>Part 3: Additional Documents Upload</h2>
                                <div class="form-group">
                                    <label for="nbtc_documents">Documents for NBTC</label>
                                    <input type="file" class="form-control-file" id="nbtc_documents"
                                        name="nbtc_documents" accept="application/pdf" onchange="previewFile(this.id)">
                                    <div id="nbtc_documents-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="caa_documents">caa_documents</label>
                                    <input type="file" class="form-control-file" id="caa_documents"
                                        name="caa_documents" accept="application/pdf" onchange="previewFile(this.id)">
                                    <div id="caa_documents-preview"></div>
                                </div>
                                <div class="form-group">
                                    <label for="other_documents">Documents for NBTC</label>
                                    <input type="file" class="form-control-file" id="other_documents"
                                        name="other_documents" accept="application/pdf" onchange="previewFile(this.id)">
                                    <div id="other_documents-preview"></div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</body>
<script>
    function previewFile(inputId) {

    }
</script>


</html>
