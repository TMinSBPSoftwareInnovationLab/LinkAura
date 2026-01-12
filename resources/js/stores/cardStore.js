import { defineStore } from 'pinia'

export const useCardStore = defineStore('card', {
    state: () => ({
        cardId: localStorage.getItem('cardId') || null
    }),
    actions: {
        setCardId(id) {
            this.cardId = id
            localStorage.setItem('cardId', id)
        },
        clearCardId() {
            this.cardId = null
            localStorage.removeItem('cardId')
        }
    }
})
