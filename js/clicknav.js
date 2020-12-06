$('button').click(function(e) {
    //e.preventDefault();
    var $this = $(this);
    $this.closest('button').find('button.active').removeClass('active');
    $this.addClass('active');
    $this.parent().addClass('active');

});