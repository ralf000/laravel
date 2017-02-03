<section class="page_section" id="clients"><!--page_section-->
    <h2>Clients</h2>
    <!--page_section-->
    <div class="client_logos"><!--client_logos-->
        <div class="container">
            <ul class="fadeInRight animated wow">
                @foreach($clients as $client)
                    <li>
                        <a href="{{ $client->link }}">
                            {{ Html::image('assets/img/' . $client->image, $client->name) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>