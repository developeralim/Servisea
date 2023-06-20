<div class="modal fade" id="OfferModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <form class="modal-content" id="offer-send-form"  method="POST">
            @csrf
            @if ( $gigs->count() == 0 ) 
                <h1 class="section-title">
                    Please create a gig first
                </h1>
            @else 
                <div class="modal-body">
                    <div class="gigs">
                        <h1 class="section-title">
                            Select A Gig
                        </h1>
                        <ul class="p-0 m-0" style="list-style:none;">
                            @foreach ($gigs as $index => $gig)
                                <li>
                                    <label for="gig-{{ $index }}" class="d-block d-flex align-items-center gig-item">
                                        <input value="{{ $gig->GIG_ID }}" required type="radio" name="gig" class="form-check-input" id="gig-{{ $index }}">
                                        <!-- 
                                            here $gig->media[0] refers to the main thumbnail of gig
                                        -->
                                        <img src="{{ $gig->media[0]->MEDIA_PATH }}" alt="{{ $gig->GIG_NAME }}">
                                        <h4 class="gig-title">{{ $gig->GIG_NAME }}</h4>
                                    </label>
                                </li>  
                            @endforeach
                        </ul>
                    </div>
                    <div class="gigs">
                        <h1 class="section-title">
                            Payment Type
                        </h1>
                        <ul class="p-0 m-0" style="list-style:none;">
                            @foreach ($payment_types as $index => $type)
                                <li>
                                    <label for="type-{{$index}}" class="d-block d-flex align-items-center gig-item payment-type">
                                        <input type="radio" value="{{ $type->ID }}" required name="payment_type" class="form-check-input" id="type-{{$index}}">
                                        <img src="{{ $type->IMAGE }}" alt="{{ $type->NAME }}">
                                        <div>
                                            <h4 class="gig-title">{{ $type->NAME }}</h4>
                                            <p class="text-muted p-0 m-0">{{ $type->SHORT_DESC }}</p>
                                        </div>
                                    </label>
                                </li>  
                            @endforeach
                        </ul>
                    </div>
                    <div class="gigs">
                        <h1 class="section-title">
                            Description, budget and delivery time
                        </h1>
                        <div class="description">
                            <textarea name="description" required placeholder="Describe you offer" class="form-control" id="" cols="10" rows="6"></textarea>
                        </div>
                        <div class="row delivery-time mt-2">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col">
                                        <label for="revision" style="font-weight:bold;">Select revision</label>
                                        <select required name="revision" style="cursor: pointer" class="form-select" id="revision">
                                            <?php
                                                for ($x = 1; $x <= 20; $x++) {
                                                   echo "<option value=".$x.">$x</option>";
                                                }
                                            ?> 
                                            <option value="100000">unlimited</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="delivery" style="font-weight:bold;">Delivery</label>
                                        <select name="delivery" required style="cursor: pointer" class="form-select" id="delivery">
                                            <?php
                                                for ($x = 1; $x <= 100; $x++) {
                                                   echo "<option value=".$x.">$x</option>";
                                                }
                                            ?> 
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <label for="price" style="font-weight:bold;">Price</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>
                                    <input type="number" name="price" id="price" class="form-control" placeholder="max:20000" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="gigs">
                        <h1 class="section-title">
                            Meta Data
                        </h1>
                        <div class="from-group">
                            <label for="expires" style="font-weight:bold;">Expires in within</label>
                            <select name="expires" style="cursor: pointer" class="form-select" id="expires">
                                <?php
                                    for ($x = 0; $x <= 30; $x++) {
                                        echo "<option value=".$x.">$x</option>";
                                    }
                                ?> 
                                <option value="0">Never expired</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <div class="form-check">
                                <input name="requirements" class="form-check-input" type="checkbox" value="1" id="requirements">
                                <label class="form-check-label" for="requirements">
                                    Request for requirements
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
</div>
<!-- Offer Modal end -->