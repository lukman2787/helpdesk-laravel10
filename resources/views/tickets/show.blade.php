<x-app-layout>
    @slot('custom_style')
    @endslot

    <div class="chat-main-row">
        <div class="chat-main-wrapper">
            <div class="col-lg-8 message-view task-view">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="float-start ticket-view-details">
                                <div class="ticket-header">
                                    <span class="m-l-15 text-muted">Status: </span> <span>{{ $status }}</span>
                                    {{-- <span class="m-l-15 text-muted">Client: </span>
                                    <a href="#"></a> --}}
                                    <span class="m-l-15 text-muted">Created: </span>
                                    <span>{{ Carbon\Carbon::parse($tickets->created_at)->translatedFormat('d F Y - H:i') }} </span>
                                    <span class="m-l-15 text-muted">Created by:</span>
                                    <span><a href="profile.html">{{ $tickets->request_firstname . ' ' . $tickets->request_lastname }}</a></span>
                                </div>
                            </div>

                            <a class="task-chat profile-rightbar float-end" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
                            <div class="task-assign">
                                @if ($tickets->status == 'O' || $tickets->status == 'R')
                                    <button type="button" class="task-complete-btn" id="ticket_completed" data-id="{{ $tickets->ticket_id }}">
                                        <i class="material-icons">check</i> Mark Complete
                                    </button>
                                @endif
                                @if ($tickets->status == 'C')
                                    <div class="task-wrapper">
                                        <div class="task-list-body">
                                            <ul id="task-list">
                                                <li class="completed task">
                                                    <div class="task-container">
                                                        <span class="task-action-btn task-check">
                                                            <span class="action-circle large complete-btn" title="Mark Complete">
                                                                <i class="material-icons">check</i>
                                                            </span>
                                                        </span>
                                                        <span class="task-label">This ticket has been Closed </span>
                                                        <span class="task-action-btn task-btn-right">
                                                            <span class="action-circle large" title="Reopen Ticket" id="ticket_reopened" data-id="{{ $tickets->ticket_id }}">
                                                                <i class="material-icons">input</i>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="task-wrapper">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="project-title">
                                                    <div class="m-b-20">
                                                        <span class="h5 card-title ">{{ $tickets->title }}</span>
                                                        <div class="float-end ticket-priority"><span>Priority:</span><span> {{ $tickets->priority }}</span>
                                                            <div class="btn-group">
                                                                <a href="#" class="badge badge-danger dropdown-toggle" data-bs-toggle="dropdown">Highest </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-danger"></i> Highest priority</a>
                                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> High priority</a>
                                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-primary"></i> Medium priority</a>
                                                                    <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-success"></i> Low priority</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p>{{ $tickets->description }}</p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title m-b-20">Uploaded image files</h5>
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="uploaded-box">
                                                            <div class="uploaded-img">
                                                                <img src="/img/placeholder.jpg" class="img-fluid" alt>
                                                            </div>
                                                            <div class="uploaded-img-name">
                                                                image 1
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="uploaded-box">
                                                            <div class="uploaded-img">
                                                                <img src="/img/placeholder.jpg" class="img-fluid" alt>
                                                            </div>
                                                            <div class="uploaded-img-name">
                                                                image 2
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="uploaded-box">
                                                            <div class="uploaded-img">
                                                                <img src="/img/placeholder.jpg" class="img-fluid" alt>
                                                            </div>
                                                            <div class="uploaded-img-name">
                                                                image 3
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 col-sm-6">
                                                        <div class="uploaded-box">
                                                            <div class="uploaded-img">
                                                                <img src="/img/placeholder.jpg" class="img-fluid" alt>
                                                            </div>
                                                            <div class="uploaded-img-name">
                                                                image 4
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="card mb-0">
                                            <div class="card-body">
                                                <h5 class="card-title m-b-20">Uploaded files</h5>
                                                <ul class="files-list">
                                                    <li>
                                                        <div class="files-cont">
                                                            <div class="file-type">
                                                                <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                            </div>
                                                            <div class="files-info">
                                                                <span class="file-name text-ellipsis"><a href="#">Ticket_document.xls</a></span>
                                                                <span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 5th at 8:21 PM</span>
                                                                <div class="file-size">Size: 14.8Mb</div>
                                                            </div>
                                                            <ul class="files-action">
                                                                <li class="dropdown dropdown-action">
                                                                    <a href class="dropdown-toggle btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#share_files">Share</a>
                                                                        <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="files-cont">
                                                            <div class="file-type">
                                                                <span class="files-icon"><i class="fa fa-file-pdf-o"></i></span>
                                                            </div>
                                                            <div class="files-info">
                                                                <span class="file-name text-ellipsis"><a href="#">Issue_report.xls</a></span>
                                                                <span class="file-author"><a href="#">John Doe</a></span> <span class="file-date">May 5th at 5:41 PM</span>
                                                                <div class="file-size">Size: 14.8Mb</div>
                                                            </div>
                                                            <ul class="files-action">
                                                                <li class="dropdown dropdown-action">
                                                                    <a href class="dropdown-toggle btn btn-link" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_horiz</i></a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <a class="dropdown-item" href="javascript:void(0)">Download</a>
                                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#share_files">Share</a>
                                                                        <a class="dropdown-item" href="javascript:void(0)">Delete</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="notification-popup hide">
                                        <p>
                                            <span class="task"></span>
                                            <span class="notification-text"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 message-view task-chat-view ticket-chat-view" id="task_window">
                <div class="chat-window">
                    <div class="fixed-header">
                        <div class="navbar">
                            <div class="task-assign">
                                <span class="assign-title">Assigned to {{ $tickets->assigned_firstname . ' ' . $tickets->assigned_lastname }}</span>
                                <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="John Doe" class="avatar">
                                    <img src="/img/profiles/{{ $tickets->request_pict }}" alt>
                                </a>
                                {{-- <a href="#" class="followers-add" title="Add Assignee" data-bs-toggle="modal" data-bs-target="#assignee"><i class="material-icons">add</i></a> --}}
                            </div>
                            <ul class="nav float-end custom-menu">
                                <li class="nav-item dropdown dropdown-action">
                                    <a href class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('tickets.edit', $tickets->ticket_id) }}">Edit Ticket</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chat-contents task-chat-contents">
                        <div class="chat-content-wrap">
                            <div class="chat-wrap-inner">
                                <div class="chat-box">
                                    <div class="chats">
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    {{-- <img src="/img/profiles/avatar-02.jpg" alt> --}}
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        {{-- <span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
                                                        <p>I'm just looking around.</p>
                                                        <p>Will you tell me something about yourself? </p> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="completed-task-msg">
                                            <span class="task-success">
                                                {{-- <a href="#">John Doe</a> closed this ticket. --}}
                                            </span>
                                            {{-- <span class="task-time">Today at 9:27am</span> --}}
                                        </div>
                                        {{-- <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img src="/img/profiles/avatar-02.jpg" alt>
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">John Doe</span>
                                                        <span class="file-attached">attached 3 files <i class="fa fa-paperclip"></i></span>
                                                        <span class="chat-time">Feb 17, 2019 at 4:32am</span>
                                                        <ul class="attach-list">
                                                            <li><i class="fa fa-file"></i> <a href="#">project_document.avi</a></li>
                                                            <li><i class="fa fa-file"></i> <a href="#">video_conferencing.psd</a></li>
                                                            <li><i class="fa fa-file"></i> <a href="#">landing_page.psd</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img src="/img/profiles/avatar-09.jpg" alt>
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">Jeffery Lalor</span>
                                                        <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span>
                                                        <span class="chat-time">Yesterday at 9:16pm</span>
                                                        <ul class="attach-list">
                                                            <li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="#">Document_2016.pdf</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="chat chat-left">
                                            <div class="chat-avatar">
                                                <a href="profile.html" class="avatar">
                                                    <img src="/img/profiles/avatar-09.jpg" alt>
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-bubble">
                                                    <div class="chat-content">
                                                        <span class="task-chat-user">Jeffery Lalor</span>
                                                        <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span>
                                                        <span class="chat-time">Today at 12:42pm</span>
                                                        <ul class="attach-list">
                                                            <li class="img-file">
                                                                <div class="attach-img-download"><a href="#">avatar-1.jpg</a></div>
                                                                <div class="task-attach-img"><img src="/img/user.jpg" alt></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="task-information">
                                            <span class="task-info-line">
                                                <a class="task-user" href="#">John Doe</a>
                                                <span class="task-info-subject">marked ticket as reopened</span>
                                            </span>
                                            <div class="task-time">1:16pm</div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chat-footer">
                        <div class="message-bar">
                            <div class="message-inner">
                                <a class="link attach-icon" href="#"><img src="/img/attachment.png" alt></a>
                                <div class="message-area">
                                    <div class="input-group">
                                        <textarea class="form-control" placeholder="Type message..."></textarea>
                                        <button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="project-members task-followers">
                            <span class="followers-title">Followers</span>
                            <a href="#" data-bs-toggle="tooltip" title="Richard Miles" class="avatar">
                                <img src="/img/profiles/avatar-09.jpg" alt>
                            </a>
                            <a href="#" data-bs-toggle="tooltip" title="John Smith" class="avatar">
                                <img src="/img/profiles/avatar-10.jpg" alt>
                            </a>
                            <a href="#" data-bs-toggle="tooltip" title="Mike Litorus" class="avatar">
                                <img src="/img/profiles/avatar-05.jpg" alt>
                            </a>
                            <a href="#" data-bs-toggle="tooltip" title="Wilmer Deluna" class="avatar">
                                <img src="/img/profiles/avatar-11.jpg" alt>
                            </a>
                            <a href="#" class="followers-add" data-bs-toggle="modal" data-bs-target="#task_followers"><i class="material-icons">add</i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal custom-modal fade" id="delete_ticket" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Ticket</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <div class="row">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" data-bs-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="assignee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Assign to this task</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group m-b-30">
                        <input placeholder="Search to add" class="form-control search-input" type="text">
                        <button class="btn btn-primary">Search</button>
                    </div>
                    <div>
                        <ul class="chat-user-list">
                            <li>
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar">
                                            <img src="/img/profiles/avatar-09.jpg" alt>
                                        </span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Richard Miles</div>
                                            <span class="designation">Web Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar">
                                            <img src="/img/profiles/avatar-10.jpg" alt>
                                        </span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">John Smith</div>
                                            <span class="designation">Android Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar">
                                            <img src="/img/profiles/avatar-10.jpg" alt>
                                        </span>
                                        <div class="media-body align-self-center text-nowrap">
                                            <div class="user-name">Jeffery Lalor</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Assign</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="task_followers" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add followers to this task</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group m-b-30">
                        <input placeholder="Search to add" class="form-control search-input" type="text">
                        <button class="btn btn-primary">Search</button>
                    </div>
                    <div>
                        <ul class="chat-user-list">
                            <li>
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar">
                                            <img src="/img/profiles/avatar-10.jpg" alt>
                                        </span>
                                        <div class="media-body media-middle text-nowrap">
                                            <div class="user-name">Jeffery Lalor</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar">
                                            <img src="/img/profiles/avatar-08.jpg" alt>
                                        </span>
                                        <div class="media-body media-middle text-nowrap">
                                            <div class="user-name">Catherine Manseau</div>
                                            <span class="designation">Android Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="media d-flex">
                                        <span class="avatar">
                                            <img src="/img/profiles/avatar-11.jpg" alt>
                                        </span>
                                        <div class="media-body media-middle text-nowrap">
                                            <div class="user-name">Wilmer Deluna</div>
                                            <span class="designation">Team Leader</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Add to Follow</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @slot('custom_script')
        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('body').addClass('mini-sidebar');

                @if (Session::has('closed'))
                    toastr.info("{{ Session::get('closed') }}");
                @endif
            });

            $(document).on('click', '#ticket_completed', function(e) {
                e.preventDefault();
                let ticket_id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Closed this ticket",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#85D630',
                    // cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, completed it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('support/closed-myticket') }}" + '/' + ticket_id,
                            type: "PUT",
                            dataType: "json",
                            data: {
                                'status': 'C',
                            },
                            success: function(response) {
                                toastr.success(response.closed);
                            },
                            error: function(xhr, status, error) {
                                // Terjadi error pada saat mengirim request
                                console.log(xhr.responseText);
                            }
                        });
                    }
                })

            });

            $(document).on('click', '#ticket_reopened', function(e) {
                e.preventDefault();
                let ticket_id = $(this).data("id");
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to Reopen this ticket",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#D68130',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Reopen it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('support/reopen-myticket') }}" + '/' + ticket_id,
                            type: "PUT",
                            dataType: "json",
                            data: {
                                'status': 'R',
                            },
                            success: function(response) {
                                toastr.info(response.reopened);
                            },
                            error: function(xhr, status, error) {
                                // Terjadi error pada saat mengirim request
                                console.log(xhr.responseText);
                            }
                        });
                    }
                })

            });
        </script>
    @endslot
</x-app-layout>
