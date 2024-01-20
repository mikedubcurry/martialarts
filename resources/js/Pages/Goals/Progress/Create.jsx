import Authenticated from "@/Layouts/AuthenticatedLayout";
import { useForm, usePage } from "@inertiajs/react";

export default function Create({ goal, sessions }) {
    const { user } = usePage().props

    const { post, errors, reset, data, setData } = useForm({
        note: '',
        session_id: ''
    })

    const submit = (e) => {
        e.preventDefault()
        post(route('goals.progress.store', goal.id))

    }

    const handleSessionChange = (e) => {
        setData('session_id', e.target.value)
    }

    return (
        <Authenticated user={user}>
            <form onSubmit={submit}>
                <label htmlFor="note">
                    <span>Notes</span>
                    <textarea name="note" id="note" cols="30" rows="10" value={data.note} onChange={e => setData('note', e.target.value)}></textarea>
                </label>
                <label htmlFor="session">
                    <span>Gym Session</span>
                    <select value={data.session_id} onChange={handleSessionChange} name="session" id="session">
                        {[{ id: '-1', date: '', discipline: { discipline: "Select a Session" } }].concat(sessions).map((session) => (
                            <option key={session.id} value={session.id}>{session.date} - {session.discipline.discipline}</option>
                        ))}
                    </select>
                </label>
                <button type="submit">Save</button>
            </form>
        </Authenticated>
    )
}
