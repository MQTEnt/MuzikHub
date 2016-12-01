<ul class="">
  <li ng-repeat="x in cates" class=""><span class="label label-primary"><% x %></span><span ng-click="removeItem($index, 'cate')" style="cursor:pointer;" class=""> ×</span></li>
</ul>
<div class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-10">
      <input class="form-control" placeholder="Search or add new category" ng-model="newCate" type="text" bs3-typeahead bs3-source="dbCates">
    </div>
  </div>
  <!-- Display tool tip when the item doesn't exsist in Database... -->
  <div class="form-group">
    <div class="col-sm-2">
      <button class="btn btn-success" ng-click="addItem('cate')" class="">Add</button>
    </div>
  </div>
  <p><%errortextCate%></p>
</div>