export default {
    computed: {
        isAuth() {
            return true;
        },
        user() {
            return {
                "name": "Rupert Lustosa",
                "email": "rupertlustosa@gmail.com",
            };
        },
        userName() {
            return this.isAuth ? "Rupert Lustosa" : null;
        }
    }
}
