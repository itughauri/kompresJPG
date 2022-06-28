var $ = window.$; // use the global jQuery instance
var res_script = $("script[src*=resumble]");
var routepost = res_script.attr("data-down_route");
var $fileUpload = $("#resumable-browse");
var $fileUploadDrop = $("#resumable-drop");
var $uploadList = $("#sortable");

if ($fileUpload.length > 0 && $fileUploadDrop.length > 0) {
    var resumable = new Resumable({
        chunkSize: (1 / 4) * 1024 * 1024, // 1MB
        simultaneousUploads: 40,
        fileType: ['png', 'jpg', 'gif'],
        maxFiles: 20,
        maxFileSize: 50 * 1024 * 1024,
        testChunks: false,
        chunkFormat: "blob",
        setChunkTypeFromFile: false,
        target: $fileUpload.data("url") || $fileUploadDrop.data("url"),
        query: {
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
    });

    if (!resumable.support) {
        $("#resumable-error").show();
    } else {
        $fileUploadDrop.show();
        resumable.assignDrop($fileUploadDrop[0]);
        resumable.assignBrowse($fileUpload[0]);

        resumable.on("fileAdded", function (file) {
            $("#upload-section").hide();
            $("#convert-section").show();
            $(".delete-file").attr("disabled", true);

            $("#convertDoc").addClass("disabled");
            $(".delete-file").addClass("disabled");
            $(".delete-file").css("cursor", "not-allowed");
            $(":checkbox.my-input").prop("disabled", true);
            $("#editor-home").show();
            $uploadList.show();
            $(".resumable-progress .progress-resume-link").hide();
            $(".resumable-progress .progress-pause-link").show();
            $("#submit").addClass("disabled");

            $("#loader")
                .append(
                    '<li id="dv-' +
                        file.uniqueIdentifier +
                        '" class="resu mx-3 preview-file resumable-file-' +
                        file.uniqueIdentifier +
                        '" style="list-style: none;">' +
                        '<label style="margin-left: 10px;width: 50%;" class="my-filed ">' +
                        '<button class="delete-file border-0 bg-transparent disabled d-none" >' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="10.111" height="13" viewBox="0 0 10.111 13">' +
                        '<path id="Icon_material-delete" data-name="Icon material-delete" d="M8.222,16.056A1.449,1.449,0,0,0,9.667,17.5h5.778a1.449,1.449,0,0,0,1.444-1.444V7.389H8.222ZM17.611,5.222H15.083L14.361,4.5H10.75l-.722.722H7.5V6.667H17.611Z" transform="translate(-7.5 -4.5)" fill="gray"/>' +
                        "</svg>" +
                        "</button>" +
                        '<div style="background-color: #28A79E;"  class="progress w-75 my-2">' +
                        '<div class="progress-bar progress-bar-striped resumable-file-' +
                        file.uniqueIdentifier +
                        ' resumable-file-progress" role="progressbar" style="width: 0%; background-color: #28A79E !important;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">' +
                        "</div>" +
                        "</div>" +
                        '<p class="text-center mt-0 text-center file-name position-absolute bottom-0">' +
                        '<span class="resumable-file-name"></span>' +
                        "</p>" +
                        "</label>"
                )
                .parent("div")
                .css("background-image", "none")
                .css("min-height", "10vw");
            $(
                ".resumable-file-" +
                    file.uniqueIdentifier +
                    " .resumable-file-name"
            ).html(file.fileName);

            resumable.upload();
        });

        var counter = 0;
        resumable.on("fileSuccess", function (file, message) {
            if (message != "done") {
                alert('Your File  "' + message + '"  is corrupted.');
                $("#dv-" + file.uniqueIdentifier).hide();
            }
            var a = $(".resu").length;

            $(".resumable-file-" + file.uniqueIdentifier)
                .find(".upload-text")
                .addClass("d-none");
            $(".upload-text").addClass("d-none");
            $(
                ".resumable-file-" +
                    file.uniqueIdentifier +
                    " .resumable-file-progress"
            )
                .html("Completed")
                .remove("rounded-end")
                .addClass("bg-success rounded-1");

            counter += 1;

            if (counter == a) {
                $("#submit").removeClass("disabled");
                window.location.reload();
            }
        });

        resumable.on("fileError", function (file, message) {
            $("#loading").hide();
            $("#submit").removeClass("disabled");
            counter++;
            alert("ukuran file tidak didukung");
            alert("File " + file.fileName + " could not be uploaded\n" + e);
            window.location.reload();
            $(
                ".resumable-file-" +
                    file.uniqueIdentifier +
                    " .resumable-file-progress"
            ).html("file could not be uploaded");
        });

        resumable.on("fileProgress", function (file) {
            $(".resumable-file-" + file.uniqueIdentifier)
                .html(Math.floor(file.progress() * 100) + "%")
                .css({
                    width: Math.floor(file.progress() * 100) + "%",
                });
        });
    }
}
