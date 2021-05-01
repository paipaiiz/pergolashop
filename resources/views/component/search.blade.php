<form action="{{route('search')}}" method="GET" class="search-form">
    <div class="form-group" style="background-color: #f3f3f9;">
        <div class="input-group solid" style="background-color: #f3f3f9;">
            <div class="input-group-prepend" style="background-color: #f3f3f9; border-color: #f3f3f9; height: 30px;">
                <span class="input-group-text" style="background-color: #f3f3f9; border-color: #f3f3f9; height: 30px;"><i class="mdi mdi-magnify" style="color: #badcc4;"></i></span>
            </div>
            <input type="text" class="form-control text-dark" style="background-color: #f3f3f9; border-left-color: #badcc4; height: 30px;" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="ค้นหา">
        </div>
    </div>
</form>
<style>
    .solid {
        border: 0px solid;
    }
</style>