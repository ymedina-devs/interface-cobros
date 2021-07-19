public void generacionArchivoCSV(OrdenesPojo paramOrdenes) {
		try {
			ConfiguracionArchivosPojo varConfguracionArchivo=configuracionArchivosRepo.findByTxFormatoAndCdBanco(
                    paramOrdenes.getTpArchivo().intValue()
                    , paramOrdenes.getCdBanco().intValue());
			File varArchivoCarga= new File(paramOrdenes.getTxDirectorioSalida()+paramOrdenes.getTxNombreSalida());
			FileReader varLectorArchivo=new FileReader(varArchivoCarga);
			BufferedReader varFlujoTexto= new BufferedReader(varLectorArchivo);
			String varLinea="";
			int varContadorLinea=1;
			HerramientasConfig herramientasConfig=new HerramientasConfig();
			CobroUnicoPojo varCobroPojoUnico=new CobroUnicoPojo();
			while((varLinea=varFlujoTexto.readLine())!=null) {
				List<CobroUnicoPojo> varListaCobroPojoUnico=new ArrayList<CobroUnicoPojo>();
				
				String [] varArrayColumnas=varLinea.split("\\|");
				if(varContadorLinea==1) {
					for(int a=0;a<varArrayColumnas.length;a++) {
						if((a+1)%varArrayColumnas.length==0) {
							List<EstructuraPojo> varEstructura= estructuraRepo.findByTpArchivoAndCdBanco(paramOrdenes.getTpArchivo().intValue(),
	                                paramOrdenes.getCdBanco().intValue(),1,1);
							for (int i = 0; i < varEstructura.size(); i++) {
								System.out.println(varArrayColumnas[varEstructura.get(i).getTx_columna()-1]+
										"=="+varEstructura.get(i).getTxNombre());
								if(varEstructura.get(i).getTxClaseObjeto()!=null) {
									if(varEstructura.get(i).getTxPatronRegular()!=null) {
										boolean varValidarString=herramientasConfig.funcValidarExpresionRegular(varEstructura.get(i).getTxPatronRegular(),
												varArrayColumnas[varEstructura.get(i).getTx_columna()-1]);
										if(varValidarString==true) {
											herramientasConfig.funcSetearAtributoDelObjecto(
													varEstructura.get(i).getTxObjetoCobroSalida(),
													varCobroPojoUnico,
													varEstructura.get(i).getTxClaseObjeto(),
													varArrayColumnas[varEstructura.get(i).getTx_columna()-1]
													);
										}else {
											System.out.println("No corresponde con la expresion regular"+
													varEstructura.get(i).getTxPatronRegular()+"=="+
													varArrayColumnas[varEstructura.get(i).getTx_columna()-1]);
										}
										
									}
									
									
									
								}
								
							}
						}
						
					}
				}
				if(varContadorLinea>=2) {
					if(varCobroPojoUnico.getEsValidoElArchivo()==1) {
						for(int a=0;a<varArrayColumnas.length;a++) {
							if((a+1)%varArrayColumnas.length==0) {
								List<EstructuraPojo> varEstructura= estructuraRepo.findByTpArchivoAndCdBanco(paramOrdenes.getTpArchivo().intValue(),
		                                paramOrdenes.getCdBanco().intValue(),2,1);
								for (int i = 0; i < varEstructura.size(); i++) {
									System.out.println(varArrayColumnas[varEstructura.get(i).getTx_columna()-1]+
											"=="+varEstructura.get(i).getTxNombre());
									if(varEstructura.get(i).getTxClaseObjeto()!=null) {
										if(varEstructura.get(i).getTxPatronRegular()!=null) {
											boolean varValidarString=herramientasConfig.funcValidarExpresionRegular(varEstructura.get(i).getTxPatronRegular(),
													varArrayColumnas[varEstructura.get(i).getTx_columna()-1]);
											if(varValidarString==true) {
												herramientasConfig.funcSetearAtributoDelObjecto(
														varEstructura.get(i).getTxObjetoCobroSalida(),
														varCobroPojoUnico,
														varEstructura.get(i).getTxClaseObjeto(),
														varArrayColumnas[varEstructura.get(i).getTx_columna()-1]
														);
											}else {
												System.out.println("No corresponde con la expresion regular "+
														varEstructura.get(i).getTxPatronRegular()+"=="+
														varArrayColumnas[varEstructura.get(i).getTx_columna()-1]);
											}
											
										}else {
											herramientasConfig.funcSetearAtributoDelObjecto(
													varEstructura.get(i).getTxObjetoCobroSalida(),
													varCobroPojoUnico,
													varEstructura.get(i).getTxClaseObjeto(),
													varArrayColumnas[varEstructura.get(i).getTx_columna()-1]
													);
										}
									}
								}
							}
							
						}
					}
				}
				if(varContadorLinea==1) {
					if(bitacoraRepo.findByCdEmpresa(varCobroPojoUnico.getCdEmpresa(), varCobroPojoUnico.getCdConsecutivoEmpresa())!=null ) {
						varCobroPojoUnico.setEsValidoElArchivo(0);
					}
					if(empresasRepo.findByCdEmpresa(varCobroPojoUnico.getCdEmpresa())==null ) {
						varCobroPojoUnico.setEsValidoElArchivo(0);
					}
				}
				if(varContadorLinea>=2) {
					ClientesPojo varClientePojoV=clientesRepo.findClientebyNuDocumento(
							varCobroPojoUnico.getTxDocumentoCL(),
			                varCobroPojoUnico.getCdEmpresa(),
			                varCobroPojoUnico.getCdBanco(),
			                varCobroPojoUnico.getTpCuentaCL(),
			                varCobroPojoUnico.getTxCuentaCL());
					if(varClientePojoV==null) {
			            ClientesPojo varClientesPojo=new ClientesPojo();
			            varClientesPojo.setCd_empresa(varCobroPojoUnico.getCdEmpresa());
			            varClientesPojo.setCdBanco(varCobroPojoUnico.getCdBanco());
			            varClientesPojo.setFeRegistro(new Date());
			            varClientesPojo.setStRegistro(1);
			            varClientesPojo.setStAfiliacion(0);
			            varClientesPojo.setTpCuenta(varCobroPojoUnico.getTpCuentaCL());
			            varClientesPojo.setTpDocumento(varCobroPojoUnico.getTpDocumentoCL());
			            varClientesPojo.setTxCorreo(varCobroPojoUnico.getTxCorreoCL());
			            varClientesPojo.setTxCuenta(varCobroPojoUnico.getTxCuentaCL());
			            varClientesPojo.setTxDocumento(varCobroPojoUnico.getTxDocumentoCL());
			            varClientesPojo.setTxRazonsocial(varCobroPojoUnico.getTxRazonsocialCL());
			            varClientesPojo.setTxTelefono(varCobroPojoUnico.getTxTelefonoCL());
			            varClientesPojo=clientesRepo.save(varClientesPojo);
			            CobrosPojo varCobrosPojo= new CobrosPojo();
			            varCobrosPojo.setCdCliente(varCobrosPojo.getCdCliente());
			            varCobrosPojo.setCdConsecutivoArchivo(varCobroPojoUnico.getCdConsecutivoEmpresa());
			            varCobrosPojo.setCdEmpresa(varCobroPojoUnico.getCdEmpresa());
			            varCobrosPojo.setFeRegistro(new Date());
			            varCobrosPojo.setMtCobro(varCobroPojoUnico.getMtCobro());
			            varCobrosPojo.setMtCobroStr(varCobroPojoUnico.getMtCobroStr());
			            varCobrosPojo.setStCobro(0);
			            varCobrosPojo.setTxReferencia1(varCobroPojoUnico.getTxReferencia1());
			            varCobrosPojo.setTxReferencia2(varCobroPojoUnico.getTxReferencia2());
			            varCobrosPojo.setTxReferencia3(varCobroPojoUnico.getTxReferencia3());
			            varCobrosPojo.setTxReferencia4(varCobroPojoUnico.getTxReferencia4());
			            varCobrosPojo.setTxReferenciaNu1(varCobroPojoUnico.getTxReferenciaNu1());
			            varCobrosPojo.setTxReferenciaNu2(varCobroPojoUnico.getTxReferenciaNu2());
			            cobrosRepo.save(varCobrosPojo);
			        }else {
			            System.out.println("Ya existe el cliente");
			            
			            CobrosPojo varCobrosPojo= new CobrosPojo();
			            //varCobrosPojo.setCdCliente(varClientePojoV.getId());
			            varCobrosPojo.setCdConsecutivoArchivo(varCobroPojoUnico.getCdConsecutivoEmpresa());
			            varCobrosPojo.setCdEmpresa(varCobroPojoUnico.getCdEmpresa());
			            varCobrosPojo.setFeRegistro(new Date());
			            varCobrosPojo.setMtCobro(varCobroPojoUnico.getMtCobro());
			            varCobrosPojo.setMtCobroStr(varCobroPojoUnico.getMtCobroStr());
			            varCobrosPojo.setStCobro(0);
			            varCobrosPojo.setTxReferencia1(varCobroPojoUnico.getTxReferencia1());
			            varCobrosPojo.setTxReferencia2(varCobroPojoUnico.getTxReferencia2());
			            varCobrosPojo.setTxReferencia3(varCobroPojoUnico.getTxReferencia3());
			            varCobrosPojo.setTxReferencia4(varCobroPojoUnico.getTxReferencia4());
			            varCobrosPojo.setTxReferenciaNu1(varCobroPojoUnico.getTxReferenciaNu1());
			            varCobrosPojo.setTxReferenciaNu2(varCobroPojoUnico.getTxReferenciaNu2());
			            cobrosRepo.save(varCobrosPojo);
			        }
				}
				varContadorLinea+=1;
				
			}
			varFlujoTexto.close();
			varLectorArchivo.close();
		} catch (Exception e) {
			e.printStackTrace();
		}
		
		
	}