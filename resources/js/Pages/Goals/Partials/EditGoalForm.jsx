export default function EditGoalForm({ goal }) {
    const submit = (e) => {
        e.preventDefault()
        console.log('yolo')
    }

    return (
        <form onSubmit={submit} className="w-full max-w-lg">
            <div className="flex flex-wrap -mx-3 mb-6">
                hi
            </div>
        </form>
    )
}
