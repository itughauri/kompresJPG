<section class="py-40 pt-100 contactis-header">
    <h3 class="section-title mb-0">Berhubungan
    </h3>
</section>
<section class="contactus py-40">
    <div class="container">
        <div class="row mx-1">
            <div class="col-lg-10 mx-auto myform">
                <div class="row align-items-center ">
                    <div class="col-lg-6 mx-auto my-4 ">
                        {{-- <form method="post" class="needs-validation" id="ordrform" action="{{ route('email') }}"
                        novalidate="">
                        @csrf
                        <div class="name">
                            <label class="mb-2" for="name">Nama</label>
                            <input type="name" class="form-control jpg-form name " id="validationCustom01 " name="name " placeholder="John " required="">
                        </div>
                        <div class="emial mt-4 ">
                            <label class="mb-2" for="name ">E-mail</label>
                            <input type="email " class="form-control jpg-form " id="validationCustom01 " name="email " placeholder="example@gmail.com " pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,}$" required>
                        </div>
                        <div class=" mt-4 ">
                            <label class="mb-2" for="name ">Pesanmu</label>
                            <textarea name="message" class="form-control jpg-form textarea" id="exampleFormControlTextarea1" rows="8" required placeholder="ketik pesanmu disini"></textarea>
                        </div>
                        {{-- <div class="form-group mt-3">
                                <div class="g-recaptcha" data-sitekey="6Lcdrc0ZAAAAACWjDxenweNCGUNVyKl9FCrPIQj2">
                                    <div style="width: 304px; height: 78px;">
                                        <div><iframe title="reCAPTCHA"
                                                src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lcdrc0ZAAAAACWjDxenweNCGUNVyKl9FCrPIQj2&amp;co=aHR0cDovL2xvY2FsaG9zdDo4MA..&amp;hl=en&amp;v=gZWLhEUEJFxEhoT5hpjn2xHK&amp;size=normal&amp;cb=jymcx67q22js"
                                                width="304" height="78" role="presentation" name="a-lido1aw21kxc"
                                                frameborder="0" scrolling="no"
                                                sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe>
                                        </div>
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"
                                            style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                    </div><iframe style="display: none;"></iframe>
                                </div>
                            </div> --}}
                        {{-- <div class="text-end ">
                                <button class="btn px-4 py-2 mt-4 w-100 jpgcontactus-btn " type="submit ">Kirim</button>
                            </div> --}}
                        {{-- </form> --}}
                        <form method="post"  class="needs-validation" id="ordrform"
                            novalidate="">
                            @csrf
                            <div class="name">
                                <label class="mb-2" for="name ">Nama</label>
                                <input type="name " class="form-control jpg-form name name-inp "
                                    id="validationCustom01 name" name="name " placeholder="John " required=" ">
                            </div>


                            <div class="emial mt-4 ">
                                <label class="mb-2" for="name ">E-mail</label>
                                <input type="email " class="form-control jpg-form email-inp "
                                    id="validationCustom01 email_" name="email " placeholder="example@gmail.com "
                                    required="">
                            </div>
                            <div class=" mt-4 ">
                                <label class="mb-2" for="name ">Pesanmu</label>
                                <textarea class="form-control jpg-form textarea" id="exampleFormControlTextarea1 messsage" rows="8" required=""
                                    placeholder="ketik pesanmu disini"></textarea>
                            </div>


                            {{-- <div class="form-group mt-3">
                                <div class="g-recaptcha" data-sitekey="6Lcdrc0ZAAAAACWjDxenweNCGUNVyKl9FCrPIQj2">
                                    <div style="width: 304px; height: 78px;">
                                        <div><iframe title="reCAPTCHA" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6Lcdrc0ZAAAAACWjDxenweNCGUNVyKl9FCrPIQj2&amp;co=aHR0cDovL2xvY2FsaG9zdDo4MA..&amp;hl=en&amp;v=gZWLhEUEJFxEhoT5hpjn2xHK&amp;size=normal&amp;cb=jymcx67q22js"
                                                width="304" height="78" role="presentation" name="a-lido1aw21kxc" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div>
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                                    </div><iframe style="display: none;"></iframe></div>
                            </div> --}}
                            <div class="text-end ">

                                <button id="submit" class="btn px-4 py-2 mt-4 w-100 jpgcontactus-btn "
                                    type="submit ">Kirim</button>

                            </div>
                        </form>
                    </div>
                    <div class="col-lg-5 d-lg-block d-none ">
                        <div>
                            <img class="img-fluid " src="{{ asset('assets/imges/contactus/404.png') }}"
                                alt="404 img not found">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#ordrform').submit(function(e) {
                    var thiss = $(this);
                    e.preventDefault();
                    if (thiss[0].checkValidity() === false) {
                        e.stopPropagation();
                        thiss.addClass('was-validated');
                        thiss.find('.form-control:invalid').first().focus();
                    } else {
                        let name  = $(".name-inp").val();
                        alert(name);
                        e.preventDefault();
                        thiss.addClass('was-validated');
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: "{{ route('email') }}",
                            data: {
                                name_: $(".name-inp").val(),
                                email_: $(".email-inp").val(),
                                message: $(".jpg-form").val()
                            },
                            type: 'post',
                            success: function(response) {
                                window.location.href = "{{ route('index') }}";
                            }
                        })
                    }
                });
            });
        </script>
    @endpush
</section>
