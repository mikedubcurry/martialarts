export default function SectionList({ title, keys, data, setSelectedItem }) {
    return (
        <div className='mt-4'>
            <h2 className='text-2xl font-bold'>{title}</h2>
            <div className=''>
                <ul className=''>
                    {data.map((item) => (
                        <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={item.id} onClick={() => setSelectedItem(item)}>
                            <div className='flex items-center gap-4'>
                                {keys.map((key) => (
                                    <p key={key}>{item[key]}</p>
                                ))}
                            </div>
                        </li>
                    ))}
                </ul>
            </div>
        </div>

    )
}
