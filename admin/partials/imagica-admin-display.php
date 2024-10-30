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

    #wpwrap {

        height: 100%;
    }

    #wpcontent {

        padding-left: 0px;
        height: 100%;
    }

    #wpbody {

        height: 100%;
    }

    #wpbody-content{

        height: 95%;
    }

    #image-carousel > img {

        transition: left 0.4s;
    }
</style>

<nav class="imagica-hidden imagica-border-b imagica-border-gray-200 imagica-bg-white lg:imagica-flex" aria-label="Breadcrumb">
    <ol role="list" class="imagica-mx-auto imagica-flex imagica-w-full imagica-max-w-screen-xl imagica-space-x-4 imagica-px-4 sm:imagica-px-6 lg:imagica-px-8">
        <li class="imagica-flex">
            <div class="imagica-flex imagica-items-center">
                <a href="./" class="imagica-text-gray-400 hover:imagica-text-gray-500">
                    <svg class="imagica-h-5 imagica-w-5 imagica-flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                    </svg>
                    <span class="imagica-sr-only"><?php echo __('Home','imagica') ?></span>
                </a>
            </div>
        </li>

        <li class="imagica-flex">
            <div class="imagica-flex imagica-items-center">
                <svg class="imagica-h-full imagica-w-6 imagica-flex-shrink-0 imagica-text-gray-200" preserveAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a href="./admin.php?page=imagica" class="imagica-ml-4 imagica-text-sm imagica-font-medium imagica-text-gray-500 hover:imagica-text-gray-700"><?php echo __('Imagica','imagica') ?></a>
            </div>
        </li>

        <li class="imagica-flex">
            <div class="imagica-flex imagica-items-center">
                <svg class="imagica-h-full imagica-w-6 imagica-flex-shrink-0 imagica-text-gray-200" preserveAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <p class="imagica-ml-4 imagica-text-sm imagica-font-medium imagica-text-gray-500 hover:imagica-text-gray-700" aria-current="page"><?php echo __('Settings','imagica') ?></p>
            </div>
        </li>
    </ol>
</nav>

<main class="imagica-mx-auto imagica-max-w-xl imagica-px-4 imagica-pt-10 imagica-pb-12 lg:imagica-pb-16">
    <?php if(current_user_can('manage_options')) :?>
        <form method="post">
            <div class="imagica-space-y-6">
                <?php if (isset($messageFailure) && !isset($messageSucess)) { ?>
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
                <?php if (isset($messageSucess)) { ?>
                    <div class="imagica-rounded-md imagica-bg-green-50 imagica-p-4">
                        <div class="imagica-flex">
                            <div class="imagica-flex-shrink-0">
                                <!-- Heroicon name: mini/check-circle -->
                                <svg class="imagica-h-5 imagica-w-5 imagica-text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="imagica-ml-3">
                                <p class="imagica-text-sm imagica-font-medium imagica-text-green-800"><?php echo esc_html($messageSucess) ?></p>
                            </div>
                            <div class="imagica-ml-auto imagica-pl-3">
                                <div class="imagica--mx-1.5 imagica--my-1.5">
                                    <button type="button" class="imagica-inline-flex imagica-rounded-md imagica-bg-green-50 imagica-p-1.5 imagica-text-green-500 hover:imagica-bg-green-100 focus:imagica-outline-none focus:imagica-ring-2 focus:imagica-ring-green-600 focus:imagica-ring-offset-2 focus:imagica-ring-offset-green-50">
                                        <span class="imagica-sr-only">Dismiss</span>
                                        <!-- Heroicon name: mini/x-mark -->
                                        <svg class="imagica-h-5 imagica-w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div>
                    <h1 class="imagica-text-lg imagica-font-medium imagica-leading-6 imagica-text-gray-900"><?php echo __('Settings Imagica','imagica') ?></h1>
                    <p class="imagica-mt-1 imagica-text-sm imagica-text-gray-500"><?php echo __('To access the Imagica Studio, you must include your Imagica API token.','imagica') ?></p>
                </div>

                <div>
                    <label for="project-name" class="imagica-block imagica-text-sm imagica-font-medium imagica-text-gray-700"><?php echo __('Token:','imagica') ?></label>
                    <div class="imagica-relative imagica-mt-1 imagica-rounded-md imagica-shadow-sm">
                        <input type="password" required name="imagica_token" id="imagica_token" class="imagica-block imagica-w-full imagica-rounded-md imagica-pr-10 imagica-shadow-sm <?php if (isset($messageFailure) && !isset($messageSucess)) { ?> imagica-border-red-300 imagica-text-red-900 imagica-placeholder-red-300 focus:imagica-border-red-500 focus:imagica-outline-none focus:imagica-ring-red-500 <?php } else { ?>  imagica-border-gray-300  sm:imagica-text-sm focus:imagica-border-sky-500 focus:ring-sky-500 <?php } ?>" value="<?php echo esc_attr(str_repeat("*", strlen(( get_option( 'imagica_token' ) )))); ?>" >
                        <?php if (isset($messageFailure) && !isset($messageSucess)) { ?>
                        <div class="imagica-pointer-events-none imagica-absolute imagica-inset-y-0 imagica-right-0 imagica-flex imagica-items-center imagica-pr-3">
                            <svg class="imagica-h-5 imagica-w-5 imagica-text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <?php } ?>
                    </div>
                    <?php if (isset($messageFailure) && !isset($messageSucess)) { ?>
                        <p class="imagica-mt-2 imagica-text-sm imagica-text-red-600" id="email-error"><?php echo esc_html($messageFailure)?></p>
                    <?php } ?>
                </div>



                <div class="imagica-flex imagica-justify-center">
                    <a class="imagica-rounded-md imagica-border imagica-border-gray-300 imagica-bg-white imagica-py-2 imagica-px-4 imagica-text-sm imagica-font-medium imagica-text-gray-700 imagica-shadow-sm hover:imagica-bg-gray-50 focus:imagica-outline-none focus:imagica-ring-2 focus:imagica-ring-sky-500 focus:imagica-ring-offset-2" href="https://app.imagica.online/signup#gettoken" target="_blank"><?php echo __('Get Token','imagica') ?></a>
                    <button type="submit" class="imagica-ml-3 imagica-inline-flex imagica-justify-center imagica-rounded-md imagica-border imagica-border-transparent imagica-bg-sky-500 imagica-py-2 imagica-px-4 imagica-text-sm imagica-font-medium imagica-text-white imagica-shadow-sm hover:imagica-bg-sky-600 focus:imagica-outline-none focus:imagica-ring-2 focus:ring-sky-500 focus:imagica-ring-offset-2"><?php echo __('Save Token','imagica') ?></button>
                </div>
            </div>
        </form>
    <?php endif?>
    <?php if(!current_user_can('manage_options')) :?>
        <div>
            <h1 class="imagica-text-lg imagica-font-medium imagica-leading-6 imagica-text-gray-900"><?php echo __('Oops something went wrong, looks like you are not authenticated.','imagica') ?></h1>
            <p class="imagica-mt-1 imagica-text-sm imagica-text-gray-500"><?php echo __('Ask a wordpress admin to setup the access token, so you can generate new images!','imagica') ?></p>
        </div>
    <?php endif?>
</main>