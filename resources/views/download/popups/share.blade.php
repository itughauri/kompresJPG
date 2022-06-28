<div class="modal fade " id="ShareModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticshare" aria-hidden="true" style="z-index: 9999999 !important; background: rgba(0,0,0,.6)">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="sharetomail" class=" needs-validation" novalidate>
                <div class="modal-header border-bottom">
                    <h5 class="modal-title" id="staticBackdropLabel">Menyalin ke clipboard</h5>
                </div>
                <div class="modal-body">
                    <div class="loading" id="loading" style="display: none;">
                        <div class="wrap">
                            <div class="loader">Loading...</div>
                            <div class="loading1" style="width: 250px;">
                            </div>
                        </div>
                    </div>
                    <p id="mail-alert" class="alert alert-success " style="display: none;">Download link has been sent
                        successfully!</p>
                    @csrf
                    <input class="form-control rounded-3" id="link" placeholder="Link" type="text" name="link" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                </div>
                <div class="modal-footer border-0">
                    <button id="cancel" type="button" class="btn border rounded-3 px-4" data-bs-dismiss="modal">membatalkan</button>
                    <button id="copyLink" type="submit" name="copyLink"  class="btn btn-primary rounded-3 px-4 border-0" style="background-color: #567aff !important;">Salin tautan</button>
                </div>
            </form>
        </div>
    </div>
</div>
