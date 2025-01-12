@if (session('success'))
  <script>
    // SweetAlert Mixin configuration
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    });

    // Trigger the toast
    Toast.fire({
      icon: 'success',
      title: '{{ session('success') }}'
    });
  </script>
@endif


@if (session('error'))
  <script>
    // Trigger SweetAlert for error
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "{{ session('error') }}"
    });
  </script>
@endif
