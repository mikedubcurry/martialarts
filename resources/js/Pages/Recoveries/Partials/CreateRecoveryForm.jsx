import { useForm } from "@inertiajs/react";

export default function CreateRecoveryForm() {
    const { data, setData, post, processing, errors, reset } = useForm({
        date: '',
        type: '',
        notes: '',
    })

    const submit = (e) => {
        e.preventDefault();
        console.log('hi');
    }

    return (
        <form onSubmit={submit} className=' max-w-lg border flex flex-col gap-6 mx-auto'>
            <label htmlFor="date">
                <span>Date</span>
                <input type="date" name="date" id="date" value={data.date} onChange={(e) => setData('date', e.target.value)} />
            </label>
            <label htmlFor="type">
                <span>Type</span>
                <select name="type" id="type" value={data.type} onChange={(e) => setData('type', e.target.value)}>
                    {/** TODO: make this a multi-select, include different recovery methods like 'ice', 'compression', 'stretching', 'massage', etc. **/}
                    <option value="massage">Massage</option>
                    <option value="compression">Compression</option>
                    <option value="stretching">Stretching</option>
                </select>
            </label>
            <label htmlFor="notes">
                <span>Notes</span>
                <textarea name="notes" id="notes" cols="30" rows="10" value={data.notes} onChange={(e) => setData('notes', e.target.value)}></textarea>
            </label>
            <button type="submit" className='bg-blue-500 text-white rounded-lg p-2' disabled={processing}>Submit</button>

        </form>
    )
}
