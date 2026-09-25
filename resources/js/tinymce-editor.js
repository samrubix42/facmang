/**
 * TinyMCE Alpine.js Integration for Livewire
 */

function registerTinymceComponent() {
    if (!window.Alpine) {
        return;
    }

    if (window.Alpine._tinymceRegistered) {
        return;
    }
    window.Alpine._tinymceRegistered = true;

    window.Alpine.data('tinymceEditor', (options = {}) => ({
        model: options.model || 'content',
        height: options.height || 400,
        placeholder: options.placeholder || 'Enter content...',
        editor: null,

        init() {
            const self = this;
            const targetEl = this.$refs.textarea || this.$el.querySelector('textarea');
            if (!targetEl) {
                return;
            }

            const targetId = targetEl.id || ('tinymce_' + Math.random().toString(36).substring(2, 10));
            targetEl.id = targetId;

            const setupEditor = () => {
                if (typeof window.tinymce === 'undefined') {
                    return;
                }

                // Remove existing instance if already attached to this element
                const existing = window.tinymce.get(targetId);
                if (existing) {
                    existing.remove();
                }

                window.tinymce.init({
                    target: targetEl,
                    base_url: '/tinymce',
                    suffix: '.min',
                    height: self.height,
                    menubar: 'edit view insert format table tools',
                    branding: false,
                    promotion: false,
                    placeholder: self.placeholder,
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                        'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                        'insertdatetime', 'media', 'table', 'wordcount'
                    ],
                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link image media | removeformat code fullscreen',
                    skin: 'oxide',
                    content_css: 'default',
                    content_style: 'body { font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; font-size: 13px; color: #1e293b; line-height: 1.6; padding: 12px; }',
                    setup(ed) {
                        self.editor = ed;

                        ed.on('init', () => {
                            let initialContent = '';
                            if (self.$wire) {
                                initialContent = self.$wire.get(self.model) || '';
                            }
                            if (!initialContent && targetEl.value) {
                                initialContent = targetEl.value;
                            }
                            if (initialContent) {
                                ed.setContent(initialContent);
                            }
                        });

                        let timer;
                        const syncContent = () => {
                            clearTimeout(timer);
                            timer = setTimeout(() => {
                                if (self.$wire && self.editor) {
                                    self.$wire.set(self.model, self.editor.getContent());
                                }
                            }, 200);
                        };

                        ed.on('change blur', () => {
                            if (self.$wire && self.editor) {
                                self.$wire.set(self.model, self.editor.getContent());
                            }
                        });

                        ed.on('keyup input NodeChange', syncContent);
                    }
                });
            };

            // Check if tinymce is ready or wait for it
            if (typeof window.tinymce === 'undefined') {
                let count = 0;
                const interval = setInterval(() => {
                    count++;
                    if (typeof window.tinymce !== 'undefined') {
                        clearInterval(interval);
                        setupEditor();
                    } else if (count > 50) {
                        clearInterval(interval);
                        // Inject script tag fallback if missing
                        if (!document.getElementById('tinymce-core-script')) {
                            const script = document.createElement('script');
                            script.id = 'tinymce-core-script';
                            script.src = '/tinymce/tinymce.min.js';
                            script.referrerPolicy = 'origin';
                            script.onload = setupEditor;
                            document.head.appendChild(script);
                        }
                    }
                }, 60);
            } else {
                this.$nextTick(() => {
                    setupEditor();
                });
            }

            // Watch for changes initiated by Livewire
            if (this.$wire) {
                this.$watch('$wire.' + this.model, (newValue) => {
                    if (self.editor && self.editor.initialized) {
                        const current = self.editor.getContent();
                        if (newValue !== current) {
                            self.editor.setContent(newValue || '');
                        }
                    }
                });
            }
        },

        destroy() {
            if (this.editor) {
                try {
                    this.editor.remove();
                } catch (e) {}
                this.editor = null;
            }
        }
    }));
}

document.addEventListener('alpine:init', registerTinymceComponent);
document.addEventListener('livewire:navigated', registerTinymceComponent);
if (window.Alpine) {
    registerTinymceComponent();
}
