
  $(document).on("click", "#delete", function(e){
    e.preventDefault(); // Prevent the href from redirecting directly
    var linkURL = $(this).attr("href");
    warnBeforeRedirect(linkURL);
  });

  function warnBeforeRedirect(linkURL) {
    swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: '#DD6B55',
    confirmButtonText: 'Yes, delete it!',
    closeOnConfirm: false,
    //closeOnCancel: false
    }, function() {
      swal("Deleted!", "Your imaginary file has been deleted!", "success");
      window.location.href = linkURL;
    });
  }

