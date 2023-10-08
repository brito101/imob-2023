<div draggable="true" class="draggable-item" data-item="{{ $client->id }}">
    <div class="card card-secondary card-outline">
        <div class="card-header" data-toggle="collapse" href="#collapse{{ $client->id }}" role="button"
            aria-expanded="false" aria-controls="collapse{{ $client->id }}">
            <h5 class="card-title" data-client_id="{{ $client->id }}">
                <span class="btn btn-tool btn-link">#{{ $client->id }}</span>{{ $client->name }}
            </h5>
        </div>

        <div class="collapse" id="collapse{{ $client->id }}">
            <div class="card-body">
                <p>
                    <b>Corretor:</b><br /> <span class="kanban_seller">{{ $client->broker }}</span>
                </p>
                <p>
                    <b>Imóvel:</b><br /> <span class="kanban_description"></span>
                </p>
            </div>
        </div>
    </div>
</div>
