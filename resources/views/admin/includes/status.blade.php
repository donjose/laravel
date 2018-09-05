@if(session()->has('status'))
    <div class = "alert alert-{{session()->get('status') == 'error' ? 'danger' : 'success'}} alert-dismissable" >
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <p>{{session()->get('msg')}}</p>
    </div>
@endif