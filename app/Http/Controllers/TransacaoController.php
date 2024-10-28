namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller {
    public function index() {
        return Transacao::with('tipo')->get();
    }

    public function store(Request $request) {
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'tipo_id' => 'required|exists:tipos_transacao,id',
            'data' => 'required|date',
        ]);
        
        if ($request->tipo == 'despesa') {
            $request['valor'] = -abs($request['valor']);
        }
        return Transacao::create($request->all());
    }

    public function show($id) {
        return Transacao::with('tipo')->findOrFail($id);
    }

    public function update(Request $request, $id) {
        $transacao = Transacao::findOrFail($id);
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'tipo_id' => 'required|exists:tipos_transacao,id',
            'data' => 'required|date',
        ]);
        
        if ($request->tipo == 'despesa') {
            $request['valor'] = -abs($request['valor']);
        }
        $transacao->update($request->all());
        return $transacao;
    }

    public function destroy($id) {
        Transacao::destroy($id);
        return response()->noContent();
    }
}
