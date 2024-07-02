@php
  $modal = match($name) {
    'image1' => 'modal-1',
    'image2' => 'modal-2',
    'image3' => 'modal-3',
    'image4' => 'modal-4',
    'image5' => 'modal-5',
    default => 'modal-default',
  };
@endphp

<div class="modal micromodal-slide" id="{{ $modal }}" aria-hidden="true">
    <div class="modal__overlay z-50" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="{{ $modal }}-title">
        <header class="modal__header">
          <h2 class="text-x1 text-gray-700" id="{{ $modal }}-title">
            ファイルを選択してください
          </h2>
          <button type="button" class="modal__close" aria-label="閉じる" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="{{ $modal }}-content">
            <div class="flex flex-wrap">
              @foreach ($images as $image)
                <div class="w-1/4 p-2 md:p-4">
                  <div class="border rounded-md p-2 md:p-4">
                    <img class="image" data-id="{{ $name }}_{{ $image->id }}"
                         data-file="{{ $image->filename }}"
                         data-path="{{ asset('storage/products') }}"
                         data-modal="{{ $modal }}"
                         src="{{ asset('storage/products/' . $image->filename) }}">
                    <div class="text-gray-700">{{ $image->title ?? 'No Title' }}</div>
                  </div>
                </div>
              @endforeach
            </div>
        </main>
        <footer class="modal__footer">
          <button type="button" class="modal__btn modal__btn-primary">Continue</button>
          <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">Close</button>
        </footer>
      </div>
    </div>
  </div>

  <div class="flex justify-around items-center mb-4">
    <a class="py-2 px-4 bg-gray-200" data-micromodal-trigger="{{ $modal }}" href='javascript:;'>ファイルを選択</a>
    <div class="w-1/4">
      <img id="{{ $name }}_thumbnail" src="">
    </div>
  </div>
  <input id="{{ $name }}_hidden" type="hidden" name="{{ $name }}" value="">
