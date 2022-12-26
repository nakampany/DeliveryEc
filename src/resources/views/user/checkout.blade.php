<p>決済ページへ移動しています。</p>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const publicKey = '{{ $publicKey }}'
    const stripe = Stripe(publicKey)

    window.onload = function() {
        stripe.redirectToCheckout({
            sessionId: '{{ $session->id }}'
        })
    }
</script>
