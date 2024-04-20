// form register
$(document).ready(function () {
    var current_fs, next_fs, previous_fs; // Fieldsets
    var opacity;

    // Fungsi untuk menampilkan fieldset berikutnya
    function showNextFieldset() {
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        // Tambahkan kelas active pada progressbar
        $("#progressbar li")
            .eq($("fieldset").index(next_fs))
            .addClass("active");

        // Tampilkan fieldset berikutnya dengan efek animasi
        next_fs
            .show()
            .css({
                opacity: 0,
            })
            .animate(
                {
                    opacity: 1,
                },
                600
            );

        // Sembunyikan fieldset saat ini
        current_fs.hide();
    }

    // Event handler untuk tombol Next
    $(".next").click(showNextFieldset);

    // Event handler untuk tombol Previous
    $(".previous").click(function () {
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        // Hapus kelas active dari progressbar
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        // Tampilkan fieldset sebelumnya dengan efek animasi
        previous_fs
            .show()
            .css({
                opacity: 0,
            })
            .animate(
                {
                    opacity: 1,
                },
                600
            );

        // Sembunyikan fieldset saat ini
        current_fs.hide();
    });

    // Fungsi untuk memeriksa kecocokan password
    function checkPasswordMatch() {
        var password = $("#pwd").val();
        var confirmPassword = $("#cpwd").val();

        var matchMessage =
            password !== confirmPassword ? "Password tidak cocok!" : "";

        $("#divCheckPasswordMatch").html(matchMessage);
        $(".next").prop("disabled", password !== confirmPassword);
    }

    // Event handler saat input password berubah
    $("#pwd, #cpwd").on("keyup", checkPasswordMatch);

    // Event handler untuk select elements
    $("select").on("change click focus", function () {
        var selectedValue = $(this).val();
        $(this).css("color", selectedValue ? "white" : ""); // Ubah warna teks berdasarkan nilai terpilih
    });
});
