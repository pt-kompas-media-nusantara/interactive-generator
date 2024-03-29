<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Interactive Generator
 * @subpackage Interactive_Generator/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<section class="galleryGenerator" id="app">
  <div class="w-full max-w-3xl">
    <div class="mb-8">
      <p class="block text-gray-800 mb-1 font-bold">Catatan:</p>
      <p class="block text-gray-800">- Setiap input dengan tanda <sup class="text-red-600 font-bold text-sm">*</sup> wajib diisi. Sisanya boleh dikosongkan.</p>
      <p class="block text-gray-800">- Pemberian <b>Judul</b> tidak boleh sama dalam satu konten</p>
      <p class="block text-gray-800">- Pemberian nama tanggal harus memiliki format yang sama</p>
      <p class="block text-gray-800">- Pada setiap input pastikan tidak ada karakter <b>"</b> dan <b>'</b></p>
    </div>
  </div>
  <div class="w-full max-w-3xl">
    <div class="mb-8">
      <div class="md:flex md:items-center mb-2">
        <div class="md:w-1/4">
          <label class="block text-gray-800 font-bold md:text-right mb-1 md:mb-0 pr-4">
            Judul Timeline<sup class="text-red-600 font-bold text-sm">*</sup>
          </label>
        </div>
        <div class="md:w-1/4">
          <input class="inputId bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="view" required placeholder="Wajib diisi" ref="inputId">
        </div>
      </div>
    </div>
  </div>
  <div class="w-full max-w-3xl">
    <div class="mb-8" v-for="(item, key) in formCount" :key="key">
      <div class="md:flex md:items-center mb-2">
        <div class="md:w-1/4">
          <label class="block text-gray-800 font-bold md:text-right mb-1 md:mb-0 pr-4">
            Tanggal<sup class="text-red-600 font-bold text-sm">*</sup>
          </label>
        </div>
        <div class="md:w-3/4">
          <input class="inputDate bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="date" required placeholder="Wajib diisi">
        </div>
      </div>
      <div class="md:flex md:items-center mb-2">
        <div class="md:w-1/4">
          <label class="block text-gray-800 font-bold md:text-right mb-1 md:mb-0 pr-4">
            Teks
          </label>
        </div>
        <div class="md:w-3/4">
          <input class="inputText bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="text">
        </div>
      </div>
      <div class="md:flex md:items-center mb-2">
        <div class="md:w-1/4">
          <label class="block text-gray-800 font-bold md:text-right mb-1 md:mb-0 pr-4">
            Link Gambar
          </label>
        </div>
        <div class="md:w-3/4">
          <input class="inputUrl bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" name="url">
        </div>
      </div>
    </div>
    <div class="md:flex md:items-center mb-8">
      <div class="md:w-1/4"></div>
      <div class="md:w-3/4">
        <div class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded inline-flex items-center" @click="createShortCodeTimeline()">
          <span>Generate Shortcode</span>
        </div>
        <div class="inline-flex float-right">
          <div class="bg-gray-300 hover:bg-gray-400 text-gray-800 text-white font-bold py-2 px-4 mr-2 text-base rounded-sm" v-if="formCount>1" @click="formCount--;showResult = false;">
            -
          </div>
          <div class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 text-base rounded-sm" @click="formCount++;showResult = false;">
            +
          </div>
        </div>
      </div>
    </div>
    <div class="md:flex md:items-center mb-2 opacity-0" v-bind:class="{ show : showResult }">
      <div class="md:w-1/4">
        <label class="block text-gray-800 font-bold md:text-right mb-1 md:mb-0 pr-4">
          Salin Shortcode ini
        </label>
      </div>
      <div class="md:w-3/4">
        <textarea class="inputResult form-textarea appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500 text-base" rows="30" name="text" ref="inputResult"></textarea>
      </div>
    </div>
</div>
</section>
