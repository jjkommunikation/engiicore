/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.custom-tabs .tab-title');
    const content = document.querySelector('.custom-tabs .tab-content')
    const panels = document.querySelectorAll('.custom-tabs .tab-panel');
    content.style.height = `${panels[0].clientHeight + 100}px`;

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            const index = Array.from(tabs).indexOf(tab);
            
            // toggle the active class
            panels.forEach((panel, idx) => {
                panel.classList.toggle('active', idx === index);
            })
            
            // first set the content height to auto
            const startHeight = `${content.clientHeight}px`;
            content.style.height = "auto";
            
            // then set the content height to the captured height of the new tab
            const endHeight = `${content.clientHeight}px`;
            content.style.height = startHeight;
            
            // forcing reflow to ensure repainting of the contents height from the browser
            content.getBoundingClientRect();

            // animate the height change to the tab
            setTimeout(() => {
                content.style.height = endHeight;
            }, 0);

            //
            /* document.querySelectorAll('.custom-tabs .tab-panel').forEach((panel, idx) => {
                jQuery('.custom-tabs .tab-content').animate({ height: panel.scrollHeight + 'px' }, 500);

                //jQuery('.custom-tabs .tab-content').animate({ height: panel.scrollHeight + 'px' }, 500);
                panel.style.transition = 'height 0.5s ease-in-out';
                panel.style.height = panel.scrollHeight + 'px';
            }); */
        });
    });
});
