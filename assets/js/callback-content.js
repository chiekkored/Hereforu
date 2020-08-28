function show_phfeed(){
  return ['<div id="wall">\
              <div class="ph-item mx-3 my-3">\
                      <div class="ph-col-12">\
                          <div class="ph-row">\
                              <div class="ph-col-4"></div>\
                              <div class="ph-col-8 empty"></div>\
                              <div class="ph-col-6 big"></div>\
                              <div class="ph-col-6 empty big"></div>\
                              <div class="ph-col-2"></div>\
                              <div class="ph-col-2 empty"></div>\
                              <div class="ph-col-2"></div>\
                              <div class="ph-col-2 empty"></div>\
                              <div class="ph-col-2"></div>\
                              <div class="ph-col-2 empty"></div>\
                          </div>\
                      </div>\
                  </div>\
                  <div class="ph-item mx-3 my-3">\
                      <div class="ph-col-12">\
                          <div class="ph-row">\
                              <div class="ph-col-4"></div>\
                              <div class="ph-col-8 empty"></div>\
                              <div class="ph-col-6 big"></div>\
                              <div class="ph-col-6 empty big"></div>\
                              <div class="ph-col-2"></div>\
                              <div class="ph-col-2 empty"></div>\
                              <div class="ph-col-2"></div>\
                              <div class="ph-col-2 empty"></div>\
                              <div class="ph-col-2"></div>\
                              <div class="ph-col-2 empty"></div>\
                          </div>\
                      </div>\
                  </div>\
            </div>']
}

function show_nofeed(){
  return ['<div class="alert alert-light mx-3 my-3" role="alert">\
          No thoughts available right now. <a href="">Refresh now</a>\
        </div>']
}

function append_tags(tags){
  for (var i = 0; i < tags.length; i++) {
    if (tags[i] == 'Sexual Abuse') {
      tags[i] = '<span class="badge badge-danger">Sexual Abuse</span>';
    } else if(tags[i] == 'Depression') {
      tags[i] = '<span class="badge badge-dark">Depression</span>';
    } else if(tags[i] == 'Physical Abuse') {
      tags[i] = '<span class="badge badge-info">Physical Abuse</span>';
    } else {
      tags[i] = '<span class="badge badge-secondary">'+tags[i]+'</span>';
    }
  }

  return [tags.join(' ')];
}

function append_pinned(data){
  return [
  '<div class="card border-warning mx-3 my-3">\
    <div class="card-body">\
    <div class="row">\
      <div class="col-12">\
        <small class="text-muted"><i class="fa fa-user-secret"></i> Admin Post</small>\
      </div>\
    </div>\
      <div class="media">\
          <div class="media-body">\
            <h5 class="mt-2">'+data.sm_title+'</h5>\
          </div>\
      </div>\
      <small><p>'+data.sm_content+'</p></small>\
    </div>\
  </div>'
  ].join('');
}

function append_feed(data){
  tags = data.p_tags.split(', ');
  user_id = $("#global_id").attr('data-id');

  if (data.p_is_efface == 1) {
    is_effaced = '<span class="badge badge-warning float-right mt-1 mr-2 text-white"><i class="fa fa-fire" aria-hidden="true"></i></span>'
  }else{
    is_effaced = ''
  }

  if (user_id == data.user_id) {
    isUser = '<div class="dropdown float-right" style="position: relative; z-index: 2;">\
                <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown">\
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>\
                </svg>\
                  </button>\
                  <div class="dropdown-menu dropdown-menu-right">\
                    <button class="btn btn-link text-decoration-none text-danger stretched-link" type="button" data-id="'+data.p_slug+'" id="btnDelete" style="outline: none; box-shadow: none;">\
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>\
                    </svg> Delete</button>\
                  </div>\
              </div>'
  } else {
    isUser = '<div class="dropdown float-right" style="position: relative; z-index: 2;">\
                <button class="btn btn-light btn-sm" type="button" data-toggle="dropdown">\
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>\
                </svg>\
                  </button>\
                  <div class="dropdown-menu dropdown-menu-right">\
                    <button class="btn btn-link text-decoration-none text-danger stretched-link" type="button" data-id="'+data.p_slug+'" id="btnReport" style="outline: none; box-shadow: none;">\
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle-fill mb-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>\
                    </svg> Report post</button>\
                  </div>\
              </div>'
  }

  if (data.p_is_featured == 1) {
    is_featured = '<div class="row mx-1 rounded-bottom bg-light"><small class="col-12 text-muted"><strong>FEATURED POST</strong></small></div>'
  } else {
    is_featured = ''
  }

  if (data.p_type == 'Guest') {
    if (data.guest_name != '') {
      isG_name = ' by <span data-toggle="tooltip" data-placement="top" title="Guest User"> '+data.guest_name+'[?] '+jQuery.timeago(data.p_date_created)+'</span></small>';
    }else{
      isG_name = ' '+jQuery.timeago(data.p_date_created)+'</small>'
    }
    return ['<div class="card text-dark mx-3 my-3 feed-item position-relative" data-post-id="'+data.p_slug+'" id="feed_item">\
          <a href="guest/'+data.p_slug+'" class="stretched-link text-decoration-none"></a>\
          '+is_featured+'\
            <div class="card-body">\
            '+isUser+is_effaced+'\
              <div class="row no-gutters">\
                <div class="col-12">'+append_tags(tags)+'</div>\
              </div>\
              <div class="row no-gutters">\
                <div class="col-12">\
                <small class="text-muted">Written'+isG_name+'\
                </div>\
              </div>\
              <div class="media">\
                <div class="media-body">\
                  <h5 class="mt-2">'+data.p_title+'</h5>\
                </div>\
            </div>\
            </div>\
          <div class="card-footer border-0" style="padding: 0px 0.95rem !important">\
            <div class="row bg-light rounded-bottom">\
                <div class="col-12 d-flex justify-content-around">\
                  <div class="text-muted">\
                    <svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>\
                      <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>\
                  </svg>\
                  <span>'+data.pvic+'</span>\
                  </div>\
                  <div class="text-muted">\
                    <svg class="bi bi-book" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                        <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>\
                        <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>\
                    </svg>\
                  <span>'+data.pric+'</span>\
                  </div>\
                  <div class="text-muted">\
                    <svg class="bi bi-heart-fill text-warning" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>\
                  </svg>\
                  <span>'+data.psic+'</span>\
                  </div>\
                </div>\
              </div>\
          </div>\
        </div>']
  } else {
    return ['<div class="card text-dark mx-3 my-3 feed-item position-relative" data-post-id="'+data.p_slug+'" id="feed_item">\
              <a href="'+data.username+'/'+data.p_slug+'" class="stretched-link text-decoration-none"></a>\
              '+is_featured+'\
            <div class="card-body">\
            '+isUser+is_effaced+'\
              <div class="row no-gutters">\
                <div class="col-12">'+append_tags(tags)+'</div>\
              </div>\
              <div class="row no-gutters">\
                <div class="col-12">\
                <small class="text-muted">Written by <a href="'+data.username+'" class="text-muted stretched-link">'+data.username+'</a> '+jQuery.timeago(data.p_date_created)+'</small>\
                </div>\
              </div>\
              <div class="media">\
                <div class="media-body">\
                  <h5 class="mt-2">'+data.p_title+'</h5>\
                </div>\
            </div>\
            </div>\
          <div class="card-footer border-0" style="padding: 0px 0.95rem !important">\
            <div class="row bg-light rounded-bottom">\
                <div class="col-12 d-flex justify-content-around">\
                  <div class="text-muted">\
                    <svg class="bi bi-eye" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>\
                      <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>\
                  </svg>\
                  <span>'+data.pvic+'</span>\
                  </div>\
                  <div class="text-muted">\
                    <svg class="bi bi-book" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>\
                      <path fill-rule="evenodd" d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>\
                  </svg>\
                  <span>'+data.pric+'</span>\
                  </div>\
                  <div class="text-muted">\
                    <svg class="bi bi-heart-fill text-warning" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">\
                      <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>\
                  </svg>\
                  <span>'+data.psic+'</span>\
                  </div>\
                </div>\
              </div>\
          </div>\
        </div>']
  }
}

function append_feed_mr(data){
  if (data.p_type == 'Guest') {
    link_type = window.location.origin+'/hereforyou/guest/'+data.p_slug 
  } else {
    link_type = window.location.origin+'/hereforyou/'+data.username+'/'+data.p_slug
  }

  if (localStorage.getItem("darkSwitch") !== null &&
        localStorage.getItem("darkSwitch") === "dark") {
    dark_list = ' text-white bg-dark'
  } else {
    dark_list = ''
  }
  return ['<a href="'+link_type+'" class="list-group-item list-group-item-action'+dark_list+'">\
            <span class="d-inline-block text-truncate" style="max-width: 150px"><b>'+data.p_title+'</b></span><small class="text-muted float-right mt-1">'+jQuery.timeago(data.p_date_created)+'</small>\
          </a>']
}