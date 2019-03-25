class ItemControls {
  constructor() {
    this.isShow = false;
    this.isActive = false;
    this.mainWrapp = false;
  }

  init() {
    let that = this;
    if ($('[data-controls]').length > 0) {
      $('[data-controls="true"]').hover(this.showControls);
      $('[data-controls="true"]').click(this.activeControls);
      $('[data-controls="true"]').mouseleave(this.hideControls);
      $('#VIEW').click(function () {
        console.log(that.isActive)
        $('.main_wrapper .active').removeClass('active');
      });
    }
  }

  showControls(e) {
    if (!this.isShow) {
      let id = $(this).attr('id');
      $(this).append(`<div class="controls-item" data-p="${id}">
        <div class="butts-wrapp text-center" data-p="${id}">
          <button class="btn btn-sm p-1 px-3 btn-success" title="Edit text"><i class="far fa-file-alt"></i></button>
          <button class="btn btn-sm p-1 px-3 btn-success" title="Edit styles"><i class="far fa-edit"></i></button>
          <button class="btn btn-sm p-1 px-3 btn-success" title="Edit indents"><i class="fas fa-compress"></i></button>
        </div>
      </div>`);
      this.isShow = true;

    }
  }

  hideControls(e) {
    if (this.isShow) {
      $(this).find('.controls-item').remove();
      this.isShow = false;
    }
  }

  activeControls(e) {
    let that = this;
    let actives = $('.main_wrapper .active');
    if ($(actives[0]).attr('id') !== $(this).attr('id')) {
      $('.main_wrapper div.active').removeClass('active');
      that.isActive = true;
      $(this).addClass('active');
    }
  }

}


$(function () {
  var Controls = new ItemControls();
  Controls.init();
  Controls.mainWrapp = $('.main_wrapp');
})
