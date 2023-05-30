$.getJSON('/dashboard', function(data) {
    // Lakukan operasi atau manipulasi data sesuai kebutuhan
    console.log(data);
})
.fail(function(jqxhr, textStatus, error) {
    console.log(error);
});
