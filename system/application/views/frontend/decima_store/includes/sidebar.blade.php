<!-- !container -->
<div class="full-width section-emphasis-1 page-header">
  <div class="container">
    <header class="row">
      <div class="col-md-12">
        <h1 class="strong-header pull-left">Shop</h1>

        <!-- BREADCRUMBS -->
        <ul class="breadcrumbs list-inline pull-right">
          <li><a href="{{url('/')}}">Home</a></li>
          <!--
                         -->
          <li>Shop</li>
        </ul>
        <!-- !BREADCRUMBS -->
      </div>
    </header>
  </div>
</div>
<!-- !full-width -->
<div class="container">
<!-- !FULL WIDTH -->
<!-- !SECTION EMPHASIS 1 -->

<div class="row">
<div class="shop-list-filters col-sm-4 col-md-3">

 

  <button type="button" class="btn btn-default btn-small visible-xs" data-texthidden="Hide Filters" data-textvisible="Show Filters" id="toggleListFilters"></button>

  <div id="listFilters">

    <div class="filters-details element-emphasis-weak">
      <!-- ACCORDION -->
      <div class="accordion" >
        <div class="panel-group">
          <!-- price range -->
          <div class="panel panel-default" style="display: none">
            <div class="panel-heading">
              <h4 class="strong-header panel-title">
                <a class="accordion-toggle" data-toggle="collapse" href="#collapse-001">
                  Price range
                </a>
              </h4>
            </div>
            <div id="collapse-001" class="panel-collapse collapse in">
              <div class="panel-body">
                <div class="filters-range" data-min="10" data-max="320" data-step="5">
                  <div class="filter-widget"></div>
                  <div class="filter-value">
                    <input type="text" class="min">
                    <input type="text" class="max">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end -->
          
          <!-- Danh mục sản phẩm -->
          <?php $list_tax = get_taxonomy_product( 'product_category' ) ?>
          @if($list_tax)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="strong-header panel-title">
                <a class="accordion-toggle" data-toggle="collapse" href="#collapse-002">
                  Danh mục sản phẩm
                </a>
              </h4>
            </div>
            <div id="collapse-002" class="panel-collapse ">
              <div class="panel-body">
                <div class="filters-checkboxes" >
                  @foreach($list_tax as $tax)
                  <a href="{{url('collections/'.$tax->taxonomy_slug)}}">
                  <div class="form-group-sidebar">
                      <label >{{$tax->taxonomy_name}}</label>
                  </div>
                   </a>
                  @endforeach
                </div>

              </div>
            </div>
          </div>
          @endif
          <!-- End danh mục -->
      
          <!-- Nhóm sản phẩm -->
          <?php $list_tax = get_taxonomy_product( 'product_group' ) ?>
          @if($list_tax)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="strong-header panel-title">
                <a class="accordion-toggle" data-toggle="collapse" href="#collapse-003">
                  Nhóm sản phẩm
                </a>
              </h4>
            </div>
            <div id="collapse-003" class="panel-collapse collapse in">
              <div class="panel-body">
               <div class="filters-checkboxes" >
                  @foreach($list_tax as $tax)
                  <a href="{{url('collections/'.$tax->taxonomy_slug)}}">
                  <div class="form-group-sidebar">
                      <label >{{$tax->taxonomy_name}}</label>
                  </div>
                   </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
          <!-- End nhóm sản phẩm -->
         

          
        </div>
      </div>
      <!-- !ACCORDION -->
    </div>
  </div>
  <!-- / #listFilters -->
</div>

<div class="clearfix visible-xs"></div>