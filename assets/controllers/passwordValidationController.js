import { Controller } from 'stimulus';

export default class extends Controller {
    static targets = ['password', 'confirmation'];

    validate() {
        const password = this.passwordTarget.value;
        const confirmation = this.confirmationTarget.value;

        if (password.length < 8) {
            alert('Le mot de passe doit contenir au moins 8 caractères.');
            return false;
        }

        if (password !== confirmation) {
            alert('La confirmation du mot de passe ne correspond pas.');
            return false;
        }
        return true;
    }
}
