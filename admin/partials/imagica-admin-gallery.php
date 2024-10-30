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
        <?php echo __('Credits', 'imagica') ?>: <?php echo esc_html($credits)?>
    </div>
</div>

<?php if (!empty($messageFailure) && !is_array($messageFailure)) { ?>
    <div class="imagica-rounded-md imagica-bg-red-50 imagica-p-4">
        <div class="imagica-flex">
            <div class="imagica-flex-shrink-0">
                <!-- Heroicon name: mini/x-circle -->
                <svg class="imagica-h-5 imagica-w-5 imagica-text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="imagica-ml-3">
                <h3 class="imagica-text-sm imagica-font-medium imagica-text-red-800"><?php echo __('Error:','imagica') ?></h3>
                <div class="imagica-mt-2 imagica-text-sm imagica-text-red-700">
                    <ul role="list" class="imagica-list-disc imagica-space-y-1 imagica-pl-5">
                        <li><?php echo esc_html($messageFailure)?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if (!empty($messageFailure) && is_array($messageFailure)) { ?>

    <?php foreach ($messageFailure as $key => $message) :?>
        <div class="imagica-rounded-md imagica-bg-red-50 imagica-p-4">
            <div class="imagica-flex">
                <div class="imagica-flex-shrink-0">
                    <!-- Heroicon name: mini/x-circle -->
                    <svg class="imagica-h-5 imagica-w-5 imagica-text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="imagica-ml-3">
                    <h3 class="imagica-text-sm imagica-font-medium imagica-text-red-800"><?php echo __('Error:','imagica') ?></h3>
                    <div class="imagica-mt-2 imagica-text-sm imagica-text-red-700">
                        <ul role="list" class="imagica-list-disc imagica-space-y-1 imagica-pl-5">
                            <li><?php echo esc_html($message['code']) . ' - ' . esc_html($message['message'])?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach?>
    
<?php } ?>

<div class="imagica-bg-white imagica-mx-4 imagica-my-4 imagica-rounded imagica-p-4 imagica-mx-auto imagica-flex imagica-flex-col imagica-h-auto imagica-justify-between">
    <form id="form-images" method="post">

        <input type="hidden" name="step" value="3">

        <!-- Campo de texto para o prompt -->
        <div>
            <div class="imagica-flex imagica-flex-col imagica-mx-20">
                <h1 class="imagica-text-lg imagica-text-gray-500"><?php echo __('Select the images you want to save to the media', 'imagica')?></h1>
                <p class="imagica-text-base imagica-text-gray-400"><?php echo __('Your description:', 'imagica')?> <?php echo esc_html($prompt)?></p>
                <input type="hidden" name="prompt" value="<?php echo esc_attr($prompt)?>">
                <input type="hidden" id="style_id" name="style_id" value="<?php echo isset($_POST['style_id']) ? esc_attr($_POST['style_id']) : ''?>">
            </div>

            <div draggable="false" class="imagica-flex imagica-flex-wrap imagica-gap-8 imagica-justify-center imagica-max-w-[60rem] imagica-mx-auto imagica-my-10" id="images_options">

                <?php foreach((empty($images) && isset($_POST['images_back']) ? $_POST['images_back'] : $images) as $key => $image): ?>
                    <div draggable="false" class="imagica-shadow imagica-relative imagica-cursor-pointer">

                        <input type="hidden" name="images_back[<?php echo esc_attr($key)?>][image_url]" value="<?php echo esc_url($image['image_url'])?>">
                        <input type="hidden" name="images_back[<?php echo esc_attr($key)?>][id]" value="<?php echo esc_attr($image['id'])?>">

                        <div draggable="false" class="imagica-min-w-[25rem] imagica-min-h-[15rem]">
                            <img draggable="false" <?php echo Self::checkBackImagesIsSelected($image) ? 'selected="true"' : ''?> onclick="selectStyle(event, 'radio_<?php echo esc_attr($image['id'])?>')" id="'img_<?php echo esc_attr($image['id'])?>'" class="imagica-select-none imagica-rounded imagica-overflow-hidden imagica-transition imagica-ring-wp-blue-400 hover:imagica-ring-2 imagica-relative imagica-z-10 imagica-max-w-[25rem] imagica-min-h-[20rem]" src="<?php echo esc_url($image['image_url'])?>"/>
                            <input type="radio" <?php echo Self::checkBackImagesIsSelected($image)? 'checked' : ''?> id="radio_<?php echo esc_attr($image['id'])?>" class="imagica-absolute imagica-z-0 imagica-top-0 imagica-bottom-0 imagica-right-0 imagica-left-0 imagica-m-auto imagica-opacity-0 imagica-w-0 imagica-self-center imagica-cursor-default" title="" name="images[<?php echo esc_attr($key)?>]" value="<?php echo esc_url($image['image_url'])?>"></input>
                        </div>
                        <a target="blank" href="<?php echo esc_url($image['image_url'])?>" class="imagica-select-none imagica-w-min imagica-absolute imagica-z-20 imagica-bottom-[-15px] imagica-bg-blue-500 imagica-rounded imagica-text-white imagica-mx-auto imagica-left-0 imagica-right-0 imagica-whitespace-nowrap imagica-p-2 imagica-text-center imagica-cursor-pointer imagica-transition hover:imagica-bg-blue-700">
	                        <?php echo __('Open image','imagica'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </form>

    <div class="imagica-w-full imagica-flex imagica-justify-between imagica-mt-20">
        <form onsubmit="formLoading(event)" method="post">
            <input type="hidden" name="prompt" value="<?php echo esc_attr($_POST['prompt'])?>">
            <input type="hidden" name="style_id" value="<?php echo esc_attr($_POST['style_id'])?>">
            <input type="hidden" name="step" value="0">
            <button type="submit" class="imagica-flex group imagica-justify-center imagica-gap-2 disabled:imagica-cursor-no-drop disabled:hover:imagica-bg-gray-400/80 imagica-bg-gray-400/80 imagica-w-64 imagica-transition hover:imagica-bg-gray-700 imagica-text-white imagica-select-none imagica-py-2 imagica-px-4 imagica-rounded focus:imagica-outline-none focus:imagica-shadow-outline">
                <?php echo __('Back', 'imagica')?>
                <svg class="imagica-hidden imagica-animate-spin imagica--ml-1 imagica-mr-3 imagica-h-5 imagica-w-5 imagica-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="imagica-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="imagica-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </form>
        <form onsubmit="formLoading(event)" method="post">
            <input type="hidden" name="prompt" value="<?php echo esc_attr($_POST['prompt'])?>">
            <input type="hidden" name="style_id" value="<?php echo esc_attr($_POST['style_id'])?>">
            <input type="hidden" name="step" value="<?php echo esc_attr($_POST['step'])?>">
            <button type="submit" class="imagica-flex group imagica-justify-center imagica-gap-2 disabled:imagica-cursor-no-drop disabled:hover:imagica-bg-red-400 imagica-bg-red-400 imagica-w-64 imagica-transition hover:imagica-bg-red-700 imagica-text-white imagica-select-none imagica-py-2 imagica-px-4 imagica-rounded focus:imagica-outline-none focus:imagica-shadow-outline">
                <?php echo __('Regenerate (Consumes credits)', 'imagica')?>
                <svg class="imagica-hidden imagica-animate-spin imagica--ml-1 imagica-mr-3 imagica-h-5 imagica-w-5 imagica-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="imagica-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="imagica-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </form>
        <button type="submit" id="saveAndBack" class="imagica-flex group imagica-justify-center imagica-gap-2 disabled:imagica-bg-blue-500/40 disabled:imagica-cursor-no-drop disabled:hover:imagica-bg-blue-500/40 imagica-bg-blue-500 imagica-w-64 imagica-transition hover:imagica-bg-blue-700 imagica-text-white imagica-select-none imagica-py-2 imagica-px-4 imagica-rounded focus:imagica-outline-none focus:imagica-shadow-outline">
            <?php echo __('Save to library and come back', 'imagica')?>
            <svg class="imagica-hidden imagica-animate-spin imagica--ml-1 imagica-mr-3 imagica-h-5 imagica-w-5 imagica-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="imagica-opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="imagica-opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </button>
    </div>
</div>

<style>

    @apply imagica-ring-4 imagica-ring-wp-blue;
</style>

<!-- JavaScript para controlar o carrossel de imagens -->
<script>

    function back(event) {

        event.preventDefault()
        window.history.go(-1)
    }

    document.getElementById("saveAndBack").addEventListener('click', (e) => {

        if(!validationSelectedImages()) return;

        event.target.setAttribute('disabled', 'disabled')
        event.target.querySelector('svg').classList.remove('imagica-hidden')

        const form = document.getElementById('form-images').submit()
    })

    function validationSelectedImages(load = false) {
        
        const selecteds = document.getElementById('images_options').querySelectorAll('img[selected="true"]')

        const selected = selecteds.length > 0 

        if(selected) {

            document.getElementById('saveAndBack').removeAttribute('disabled')

            if(load === true) {
                Array.from(selecteds).map((element) => {
                    element.classList.add('imagica-ring-4')
                    element.classList.add('hover:imagica-ring-4')
                    element.classList.add('imagica-ring-wp-blue')

                    element.setAttribute('selected', true)
                })
            }

            return selected
        }
        
        document.getElementById('saveAndBack').setAttribute('disabled', 'disabled')
        
        return selected
    }

    validationSelectedImages(true)

    function selectStyle({ srcElement }, id) {
        
        if(srcElement.getAttribute('selected')) {

            srcElement.classList.remove('imagica-ring-4')
            srcElement.classList.remove('hover:imagica-ring-4')
            srcElement.classList.remove('imagica-ring-wp-blue')

            document.getElementById(id).removeAttribute('checked')

            srcElement.removeAttribute('selected', false)

            return validationSelectedImages()
        }

        srcElement.classList.add('imagica-ring-4')
        srcElement.classList.add('hover:imagica-ring-4')
        srcElement.classList.add('imagica-ring-wp-blue')

        document.getElementById(id).setAttribute('checked', 'checked')

        srcElement.setAttribute('selected', true)
        
        validationSelectedImages()
    }

    function formLoading(event) {

        if (event.submitter.getAttribute('disabled')) event.preventDefault()

        event.submitter.setAttribute('disabled', 'disabled')
        event.submitter.querySelector('svg').classList.remove('imagica-hidden')
    }
</script>