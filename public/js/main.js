$(document).ready(function() {

        /* -------------------------------------------------------------------------*
     * WOW ANIMATION
     * -------------------------------------------------------------------------*/
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 120, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function (box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
        }
    });
    $(window).load(function () {
        wow.init();
    });
     /*modal open special*/
      $('.btn[data-toggle=modal]').on('click', function(){
   var $btn = $(this);
   var currentDialog = $btn.closest('.modal-dialog'),
   targetDialog = $($btn.attr('data-target'));;
   if (!currentDialog.length)
   return;
   targetDialog.data('previous-dialog', currentDialog);
   currentDialog.addClass('aside');
   var stackedDialogCount = $('.modal.in .modal-dialog.aside').length;
   if (stackedDialogCount <= 5){
   currentDialog.addClass('aside-' + stackedDialogCount);
   }
   });
   
   $('.modal').on('hide.bs.modal', function(){
   var $dialog = $(this);
   var previousDialog = $dialog.data('previous-dialog');
   if (previousDialog){
   previousDialog.removeClass('aside');
   $dialog.data('previous-dialog', undefined);
   }
   });
   
     $("#signin").on( "click", function() {
   $('#myModal1').modal('hide');
   });
   //trigger next modal
   $("#signin").on( "click", function() {
   $('#test-modal').modal('show');
   });

   $('.modal').on('show.bs.modal', function () {
   if ($(document).height() > $(window).height()) {
   // no-scroll
   $('body').addClass("modal-open-noscroll");
   }
   else {
   $('body').removeClass("modal-open-noscroll");
   }
   });
   $('.modal').on('hide.bs.modal', function () {
   $('body').removeClass("modal-open-noscroll");
   });

    $(".toggle-accordion").on("click", function() {
    var accordionId = $(this).attr("accordion-id"),
      numPanelOpen = $(accordionId + ' .collapse.in').length;
    
    $(this).toggleClass("active");

    if (numPanelOpen == 0) {
      openAllPanels(accordionId);
    } else {
      closeAllPanels(accordionId);
    }
  })

  openAllPanels = function(aId) {
    console.log("setAllPanelOpen");
    $(aId + ' .panel-collapse:not(".in")').collapse('show');
  }
  closeAllPanels = function(aId) {
    console.log("setAllPanelclose");
    $(aId + ' .panel-collapse.in').collapse('hide');
  }
});   // end jquery

