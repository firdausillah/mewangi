 $(document).ready(function () {
    //  // highlight navbar
    //  var path = location.pathname.split('/');
    //  var url = location.origin + location.pathname;
    // //  var url = location.origin + '/' + path[1] + '/' + path[2] + '/' + path[3] + '/' + path[4];

    // $('nav.navmenu ul li a').each(function() {

    //   if ($(this).attr('href') != undefined) {
    //     console.log($(this).attr('href'));
    //     console.log($(this).attr('href').indexOf(url) );
    //     if ($(this).attr('href').indexOf(url) !== -1) {
    //        $(this).parent().addClass('active');
    //      }
    //    }
    //  });

   $('#datatables_table').DataTable({
      responsive: true
   });
 }) 


const flashData = $('.flash-data').data('flashdata');
const flashDataStatus = $('.flash-data').data('fdstatus');

if (flashData) {
    Swal.fire({
        icon: flashDataStatus,
        title: flashDataStatus,
        text: flashData,
        timer: 2000
    });
}