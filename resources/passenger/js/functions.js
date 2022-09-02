message = (title, color, backgroundColor) => {
    Swal.fire({
        position: 'top-end',
        html:`<b style="font-size:12px">${title}</b>`,
        showConfirmButton: false,
        color: `${color}`,
        background: `${backgroundColor}`,
        timer: 2500
    })
}