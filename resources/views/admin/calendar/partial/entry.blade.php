  <div class="row">

               <div class='col-md-4 col-sm-6'>{!! Former::text('user_id')
               -> label(trans('calendar::calendar.label.user_id'))
               -> placeholder(trans('calendar::calendar.placeholder.user_id'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('category_id')
               -> label(trans('calendar::calendar.label.category_id'))
               -> placeholder(trans('calendar::calendar.placeholder.category_id'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::datetime('start')
               -> label(trans('calendar::calendar.label.start'))
               -> placeholder(trans('calendar::calendar.placeholder.start'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::datetime('end')
               -> label(trans('calendar::calendar.label.end'))
               -> placeholder(trans('calendar::calendar.placeholder.end'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('location')
               -> label(trans('calendar::calendar.label.location'))
               -> placeholder(trans('calendar::calendar.placeholder.location'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('title')
               -> label(trans('calendar::calendar.label.title'))
               -> placeholder(trans('calendar::calendar.placeholder.title'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('details')
               -> label(trans('calendar::calendar.label.details'))
               -> placeholder(trans('calendar::calendar.placeholder.details'))!!}
               </div>

               <div class='col-md-4 col-sm-6'>{!! Former::text('created_by')
               -> label(trans('calendar::calendar.label.created_by'))
               -> placeholder(trans('calendar::calendar.placeholder.created_by'))!!}
               </div>
        </div>