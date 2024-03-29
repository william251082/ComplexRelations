(function ($) {
    $(document).ready(function () {
        var $wrapper = $('.js-genus-scientist-wrapper');
        $wrapper.on('click', 'js-remove-scientist', function (e) {
            e.preventDefault();

            $(this).closest('.js-genus-scientist-item')
                .remove();
        });

        $wrapper.on('click', '.js-genus-scientist-add', function (e) {
            e.preventDefault();

            // Get the data-prototype explained earlier
            var prototype = $wrapper.data('prototype');

            // get the new index
            var index = $wrapper.data('index');

            var newForm = prototype;
            // You need this only if you didn't set 'label' => false in your tags field in TaskType
            // Replace '__name__label__' in the prototype's HTML to
            // instead be a number based on how many items we have
            // newForm = newForm.replace(/__name__label__/g, index);

            // Replace '__name__' in the prototype's HTML to
            // instead be a number based on how many items we have
            newForm = newForm.replace(/__name__/g, index);

            // increase the index with one for the next item
            $wrapper.data('index', index + 1);

            // Display the form in the page in an li, before the "Add a tag" link li
            $(this).before(newForm);
        })
    });
})
