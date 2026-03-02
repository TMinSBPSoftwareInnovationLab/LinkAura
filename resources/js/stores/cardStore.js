import { defineStore } from 'pinia'

export const useCardStore = defineStore('card', {
    state: () => ({
        // மொபைல் பிரவுசர்களில் ஸ்டோரேஜ் ரீட் செய்வதை உறுதி செய்ய
        cardId: localStorage.getItem('cardId') || null
    }),
    
    getters: {
        // வேல்யூவை எப்போதும் நம்பகத்தன்மையுடன் எடுக்க ஒரு Getter
        getCardId: (state) => {
            return state.cardId || localStorage.getItem('cardId');
        }
    },

    actions: {
        setCardId(id) {
            if (!id) return; // Null வேல்யூ செட் ஆவதைத் தடுக்க
            
            this.cardId = id;
            localStorage.setItem('cardId', id);
            
            // டிபக் செய்ய (டெவலப்மென்ட் போது மட்டும்)
            console.log("Card ID updated in Store & LocalStorage:", id);
        },

        clearCardId() {
            this.cardId = null;
            localStorage.removeItem('cardId');
        },

        // மொபைலில் டேட்டா மிஸ் ஆகாமல் இருக்க ஒரு ரீ-செக் மெத்தட்
        syncCardId() {
            const storedId = localStorage.getItem('cardId');
            if (storedId && this.cardId !== storedId) {
                this.cardId = storedId;
            }
            return this.cardId;
        }
    }
})