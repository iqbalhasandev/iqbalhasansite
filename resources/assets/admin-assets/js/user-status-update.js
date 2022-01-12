function userStatusUpdate(t, s, a) {
    axios
        .post(t, { status_id: $("#status_id_" + s).val() })
        .then((t) => {
            toastr.success("User Status Successfully Updated.");
        })
        .catch((t) => {
            $("#status_id_" + s).val(a),
                toastr.error("Faild to Update User Status");
        });
}
