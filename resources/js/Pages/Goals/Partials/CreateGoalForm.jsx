import { useForm } from "@inertiajs/react"

export default function CreateGoalForm({ }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        goal: '',
    });

    const submit = (e) => {
        e.preventDefault()
        console.log('yolo')
        post('/goals', {
            onSuccess: () => {
                reset('goal')
            }
        })
    }


    return (
        <form onSubmit={submit} className="w-full max-w-lg">
            <label htmlFor="goal" className="block text-gray-700 text-sm font-bold mb-2">Goal</label>
            <input type="text" name="goal" id="goal" value={data.goal} onChange={(e) => setData('goal', e.target.value)} className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
            <button type="submit" className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
                Create
            </button>
        </form>
    )
}
