<?php

/**
 * Provide a admin setting vires
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Imagica
 * @subpackage Imagica/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<!-- Breadcrumb -->

<style>
    #wpcontent {

        padding-left: 0px;
    }
</style>
<nav class="imagica-hidden imagica-border-b imagica-border-gray-200 imagica-bg-white lg:imagica-flex imagica-sticky" aria-label="Breadcrumb">
    <ol role="list" class="imagica-mx-auto imagica-flex imagica-w-full imagica-max-w-screen-xl imagica-space-x-4 imagica-px-4 sm:imagica-px-6 lg:imagica-px-8">
        <li class="imagica-flex">
            <div class="imagica-flex imagica-items-center">
                <a href="./" class="imagica-text-gray-400 hover:imagica-text-gray-500">
                    <svg class="imagica-h-5 imagica-w-5 imagica-flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                    </svg>
                    <span class="imagica-sr-only"><?php echo __('Home', 'imagica') ?></span>
                </a>
            </div>
        </li>

        <li class="imagica-flex">
            <div class="imagica-flex imagica-items-center">
                <svg class="imagica-h-full imagica-w-6 imagica-flex-shrink-0 imagica-text-gray-200" preserveAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <p class="imagica-ml-4 imagica-text-sm imagica-font-medium imagica-text-gray-500 hover:imagica-text-gray-700"><?php echo __('Imagica', 'imagica') ?></p>
            </div>
        </li>

    </ol>
</nav>
<!-- O formulário em si -->

<div class="imagica-mx-4 imagica-my-2 imagica-flex imagica-justify-end">
    <div class="imagica-p-2 imagica-whitespace-nowrap imagica-text-md imagica-px-4 imagica-bg-white imagica-rounded imagica-w-min">
        <?php echo esc_html(__('Credits', 'imagica')) ?>: <?php echo esc_html($credits) ?>
    </div>
</div>

<?php if (!empty($messageFailure)) { ?>
    <div class="imagica-rounded-md imagica-bg-red-50 imagica-p-4">
        <div class="imagica-flex">
            <div class="imagica-flex-shrink-0">
                <!-- Heroicon name: mini/x-circle -->
                <svg class="imagica-h-5 imagica-w-5 imagica-text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="imagica-ml-3">
                <h3 class="imagica-text-sm imagica-font-medium imagica-text-red-800"><?php echo __('Error:', 'imagica') ?></h3>
                <div class="imagica-mt-2 imagica-text-sm imagica-text-red-700">
                    <ul role="list" class="imagica-list-disc imagica-space-y-1 imagica-pl-5">
                        <li><?php echo esc_html($messageFailure) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (isset($messageSuccess)) { ?>
    <div class="imagica-rounded-md imagica-bg-green-50 imagica-p-4">
        <div class="imagica-flex">
            <div class="imagica-flex-shrink-0">
                <!-- Heroicon name: mini/check-circle -->
                <svg class="imagica-h-5 imagica-w-5 imagica-text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="imagica-ml-3">
                <p class="imagica-text-sm imagica-font-medium imagica-text-green-800"><?php echo esc_html($messageSuccess)?></p>
            </div>
        </div>
    </div>
<?php } ?>

<form onsubmit="formLoading(event)" class="imagica-bg-white imagica-mx-4 imagica-my-4 imagica-rounded imagica-p-4 imagica-mx-auto imagica-flex imagica-flex-col imagica-h-auto imagica-justify-between" method="post">
    <!-- Campo de texto para o prompt -->
    <input type="hidden" name="step" value="2">

    <div class="imagica-mb-4">
        <div class="imagica-mb-2 imagica-text-lg imagica-tracking-tight imagica-text-slate-700" for="prompt">
            Prompt:
        </div>
        <textarea required rows="10" maxlength="1200" placeholder="<?php echo __('Enter prompt here', 'imagica') ?>" name="prompt" id="prompt" class="imagica-block imagica-min-h-[38px] imagica-w-full imagica-h-auto imagica-rounded-md imagica-border-gray-300 imagica-shadow-sm focus:imagica-border-blue-500 focus:imagica-ring-blue-500 sm:imagica-text-sm"><?php if (isset($prompt)) echo esc_textarea($prompt) ?></textarea>
    </div>

    <!-- Carrossel de imagens -->
    <div class="imagica-mb-4 imagica imagica-flex imagica-flex-col imagica-gap-2 imagica-relative">
        <div class="imagica-mt-4 imagica-text-lg imagica-tracking-tight imagica-text-slate-700" for="prompt">
            <?php echo __('Select image style', 'imagica') ?>:
        </div>

        <ul id="image-carousel" class="imagica-flex imagica-mx-8 imagica-py-4 imagica-justify-center imagica-gap-5 imagica-overflow-hidden imagica-relative imagica-z-10">
            <!-- Adicione imagens aqui -->
        </ul>
        <div class="imagica-flex imagica-justify-between imagica-absolute imagica-top-[50%] imagica-w-full imagica-z-0">
            <svg xmlns="http://www.w3.org/2000/svg" onclick="moveCarrousel('left', event)" class="imagica-w-[32px] imagica-cursor-pointer imagica-transition hover:imagica-fill-wp-blue imagica-fill-gray-200" viewBox="0 0 384 512">
                <path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 278.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z" />
            </svg>
            <input class="imagica-opacity-0 imagica-w-0 imagica-self-center imagica-cursor-default" title="" oninput="(event) => event.preventDefault()" id="style-selected" type="radio" name="style_id" value="<?php echo isset($style_id) ? esc_attr($style_id) : '' ?>" required>
            <svg xmlns="http://www.w3.org/2000/svg" onclick="moveCarrousel('right', event)" class="imagica-w-[32px] imagica-cursor-pointer imagica-transition hover:imagica-fill-wp-blue imagica-fill-gray-200" viewBox="0 0 384 512">
                <path d="M342.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L274.7 256 105.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
            </svg>
        </div>
    </div>

    <!-- Botão de envio -->
    <div class="imagica-flex imagica-items-center imagica-w-full imagica-justify-center imagica-mt-20">
        <button class="imagica-flex group imagica-justify-center imagica-gap-2 imagica-bg-green-500 imagica-cursor-pointer disabled:imagica-cursor-not-allowed disabled:imagica-opacity-50 disabled:hover:imagica-bg-green-500 imagica-w-64 imagica-transition hover:imagica-bg-green-700 imagica-text-white imagica-select-none imagica-py-2 imagica-px-4 imagica-rounded focus:imagica-outline-none focus:imagica-shadow-outline" type="submit">
            <?php echo esc_html(__('Generate image', 'imagica')) ?>
            <svg class="imagica-hidden imagica-animate-spin imagica--ml-1 imagica-mr-3 imagica-h-5 imagica-w-5 imagica-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="imagica-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="imagica-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </button>
    </div>
</form>

<!-- JavaScript para controlar o carrossel de imagens -->
<script>
    let limitCarrousel = window.innerWidth < 1920 ? (window.innerWidth <= 1280 ? 3 : 4) : 5

    // Função para adicionar imagens ao carrossel
    function addImagesToCarousel(imageUrls) {

        // Obtém o elemento do carrossel
        const carousel = document.getElementById('image-carousel')

        // Adiciona cada imagem ao carrossel
        imageUrls.forEach((image, index) => {

            const imageDiv = document.createElement('li')
            const container = document.createElement('div')
            const imageElement = document.createElement('img')

            const title = document.createElement('div')

            imageDiv.addEventListener('click', (event) => selectStyle(event, image.id))

            imageElement.src = image.image_url
            imageElement.setAttribute('id', image.id)

            if (index >= limitCarrousel) {

                handlerStyle(imageDiv)
            } else {

                imageDiv.classList.add(`imagica-z-1`)
            }

            title.innerText = image.style
            title.classList.add('imagica-cursor-pointer', 'hover:imagica-bg-blue-700', 'imagica-transition', 'imagica-w-32', 'imagica-shadow', 'imagica-items-center', 'imagica-justify-center', 'imagica-text-white', 'imagica-rounded', 'imagica-text-center', 'imagica-h-8', 'imagica-flex', 'imagica-bg-blue-500', 'imagica-absolute', 'imagica-left-0', 'imagica-right-0', 'imagica-mx-auto', 'imagica-bottom-[-14px]')

            container.classList.add('imagica-relative')
            imageElement.classList.add('imagica-w-72', 'imagica-h-64', 'imagica-transition', 'imagica-object-cover', 'imagica-rounded', 'imagica-ring-wp-blue-400', 'hover:imagica-ring-2')
            imageElement.setAttribute('draggable', false)
            imageDiv.classList.add('imagica-cursor-pointer', 'imagica-transition', 'hover:imagica-backdrop-sepia-0')

            container.appendChild(imageElement)
            container.appendChild(title)
            imageDiv.appendChild(container)
            carousel.appendChild(imageDiv)
        });
    }

    function moveCarrousel(operation, event) {

        event.preventDefault()

        const carousel = document.getElementById('image-carousel')
        const images = carousel.querySelectorAll('li')

        if (images.length <= limitCarrousel) return

        if (operation === 'left') {

            carousel.prepend(images[images.length - 1])
            handlerStyle(images[images.length - 1], false)
            handlerStyle(carousel.querySelectorAll('li')[limitCarrousel])
        }

        if (operation === 'right') {

            handlerStyle(images[0])
            carousel.appendChild(images[0])
            handlerStyle(images[limitCarrousel], false)
        }
    }

    function handlerStyle(imageElement, hidden = true) {

        if (hidden === true) {

            imageElement.classList.add(`imagica-absolute`)
            imageElement.classList.add(`imagica-hidden`)
            imageElement.classList.add(`imagica-z-0`)
        }

        if (hidden === false) {

            imageElement.classList.remove(`imagica-absolute`)
            imageElement.classList.remove(`imagica-opacity-0`)
            imageElement.classList.remove(`imagica-hidden`)
            imageElement.classList.remove(`imagica-z-0`)
        }

    }

    function selectStyle(event, id) {

        const carouselSelecteds = document.getElementById('image-carousel').querySelectorAll("li[selected='true']")
        const select = document.getElementById('image-carousel').querySelector(`img[id="${id}"]`)

        if (carouselSelecteds.length > 0) {

            console.log(carouselSelecteds)

            Array.prototype.map.call(carouselSelecteds, (selecteds) => {

                const image = selecteds.querySelector('img')

                selecteds.removeAttribute('selected')
                image.classList.remove('imagica-ring-4')
                image.classList.remove('hover:imagica-ring-4')
                image.classList.remove('imagica-ring-wp-blue')
            })
        }

        select.classList.add('imagica-ring-4')
        select.classList.add('hover:imagica-ring-4')
        select.classList.add('imagica-ring-wp-blue')

        localStorage.style_id = id

        const imageDiv = event.composedPath().filter((item) => item.nodeName === 'LI')[0]

        document.getElementById('style-selected').value = select.getAttribute('id')
        document.getElementById('style-selected').setAttribute('checked', 'checked')

        imageDiv.setAttribute('selected', true)
    }

    function formLoading(event) {

        if (event.submitter.getAttribute('disabled')) event.preventDefault()

        event.submitter.setAttribute('disabled', 'disabled')
        event.submitter.querySelector('svg').classList.remove('imagica-hidden')
    }

    // Adiciona as imagens iniciais ao carrossel

    const style_id = document.getElementById("style-selected").value != '' ? document.getElementById("style-selected").value : localStorage.style_id

    let imageSelected = {}

    let images = (JSON.parse('<?php echo wp_json_encode($list_artist) ?>').filter((image) => {

        if (image.id == style_id) {

            imageSelected = image
            return
        }

        if (image.id != style_id) {
            return image
        }
    }))

    if (style_id != '' && style_id != undefined) {
        images.unshift(imageSelected)
    }

    addImagesToCarousel(images)

    if (style_id != '' && style_id != undefined) {

        const select = document.getElementById('image-carousel').querySelector(`img[id="${style_id}"]`)

        select.classList.add('imagica-ring-4')
        select.classList.add('hover:imagica-ring-4')
        select.classList.add('imagica-ring-wp-blue')

        const imageDiv = select.parentElement.parentElement

        document.getElementById('style-selected').value = select.getAttribute('id')
        document.getElementById('style-selected').setAttribute('checked', 'checked')

        imageDiv.setAttribute('selected', true)
    }
</script>