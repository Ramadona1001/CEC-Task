<div class="col-lg-4">

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fa fa-arrow-right"></i>&nbsp;Categories
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
            <ul style="list-style: none;padding-left: 12px;padding-right: 12px;">
                @foreach ($categories as $category)
                    <li><input type="checkbox" class="cat common_selector" id="cat_{{ $category->id }}" value="{{ $category->id }}"> <label for="cat_{{ $category->id }}">{{ $category->name.' ('.$category->productCount().')' }}</label></li>
                @endforeach
            </ul>
        </div>
      </div>
    </div>
   
    
  </div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-arrow-right"></i>&nbsp;Brands
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
          <ul style="list-style: none;padding-left: 12px;padding-right: 12px;">
              @foreach ($brands as $brand)
                  <li><input type="checkbox" class="brand common_selector" id="brand_{{ $brand->id }}" value="{{ $brand->id }}"> <label for="brand_{{ $brand->id }}">{{ $brand->name.' ('.$brand->productCount().')' }}</label></li>
              @endforeach
          </ul>
      </div>
    </div>
  </div>
 
  
</div>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class="fa fa-arrow-right"></i>&nbsp;Price
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <input type="hidden" id="hidden_minimum_price" value="{{ $minPrice }}" />
        <input type="hidden" id="hidden_maximum_price" value="{{ $maxPrice }}" />
        <p id="price_show">{{ $minPrice }} EGP - {{ $maxPrice }} EGP</p>
        <div id="price_range"></div>
      </div>
    </div>
  </div>
 
  
</div>
    

    
</div>