import Vue from 'vue'
import VueI18n from 'vue-i18n'

Vue.use(VueI18n);

const messages = {
    en: {
        message: {
            home: 'home',
            new_post: 'new post',
            new_posts: 'new posts',
            profile: 'profile',
            search: 'search',
            logout: 'logout',
            login: 'login',
            back: 'back',
            faq: 'F.A.Q',
            page_not_found: 'page not found',
            maybe_you_mean: 'maybe you mean',
            create_new_post: 'create new post',
            write_post_title: 'wtire post title',
            title: 'title',
            enter_main_text: 'enter main text',
            select_categories: 'select categories',
            upload_image: 'upload image',
            post_list: 'post list',
            frequently_asked_questions: 'frequently asked questions',
            how_to_register: 'how to register',
            how_to_create_post: 'how to create a post',
            how_to_edit_profile: 'how to edit profile',
            save: 'save',

        }
    },
    ru: {
        message: {
            home: 'главная',
            new_post: 'новый пост',
            new_posts: 'новые посты',
            profile: 'профиль',
            logout: 'выйти',
            login: 'войти',
            back: 'назад',
            search: 'поиск',
            page_not_found: 'страница не найдена',
            maybe_you_mean: 'возможно вы имели ввиду',
            create_new_post: 'создаете новый пост',
            write_post_title: 'введите название поста',
            title: 'заголовок',
            enter_main_text: 'введите основной текст',
            select_categories: 'Выберите категории',
            upload_image: 'загрузить изображение',
            post_list: 'список постов',
            frequently_asked_questions: 'часто задаваемые вопросы',
            how_to_register: 'как зарагистрироваться',
            how_to_create_post: 'как создать статью',
            how_to_edit_profile: 'как редактировать профиль',
            save: 'сохранить',
        }
    }
};

// Create VueI18n instance with options
const i18n = new VueI18n({
    locale: 'ru', // set locale
    messages, // set locale messages
});

export default i18n;